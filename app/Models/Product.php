<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Arr;
use Carbon\Carbon;
use App\Traits\EloquentHelper;

class Product extends Model
{
    use HasFactory, EloquentHelper, SoftDeletes;

    protected $fillable = [
        'title',
        'barcode',
        'price',
        'description',
        'quantity',
        'is_active',
    ];
    
    public static function add(array $req)
    {
        $product = self::create([
            'title' => $req['title'],
            'barcode' => $req['barcode'],
            'price' => $req['price'],
            'description' => $req['description'] ?? null,
            'quantity' => $req['quantity'],
            'is_active' => filter_var($req['is_active'], FILTER_VALIDATE_BOOLEAN)
        ]);

        $product->syncFiles($req);
    }

    public function edit(array $req)
    {
        $this->updateColumn($req, 'title');
        $this->updateColumn($req, 'barcode');
        $this->updateColumn($req, 'price');
        $this->updateColumn($req, 'description');
        $this->updateColumn($req, 'quantity');
        $this->updateColumn($req, 'is_active');
        $this->save();

        $this->syncFiles($req);
    }

    public function productHasImages()
    {
        return $this->hasMany(ProductHasImages::class);
    }

    public function syncFiles(array $request, $user = null)
    {
        if (Arr::has($request, 'upload_files') and filled($request['upload_files']) and is_array($request['upload_files'])) {
            foreach ($request['upload_files'] as $file) {
                ProductHasImages::add($file, $this->id, $user);
            }
        }
        if (Arr::has($request, 'files_for_delete') and filled($request['files_for_delete']) and is_array($request['files_for_delete'])) {
            foreach ($request['files_for_delete'] as $file) {
                deleteFile($file);
            }

            $this->productHasImages()->whereIn('url', $request['files_for_delete'])->delete();
        }
    }
}
