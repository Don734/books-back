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
        'sale_price',
        'description',
        'quantity',
        'is_active',
        'is_new',
        'is_recommend',
    ];
    
    public static function add(array $req)
    {
        $product = self::create([
            'title' => $req['title'],
            'barcode' => $req['barcode'],
            'price' => $req['price'],
            'sale_price' => $req['sale_price'] ?? null,
            'description' => $req['description'] ?? null,
            'quantity' => $req['quantity'],
            'is_active' => filter_var($req['is_active'] ?? 'false', FILTER_VALIDATE_BOOLEAN),
            'is_new' => filter_var($req['is_new'] ?? 'false', FILTER_VALIDATE_BOOLEAN),
            'is_recommend' => filter_var($req['is_recommend'] ?? 'false', FILTER_VALIDATE_BOOLEAN) ?? null,
        ]);

        $product->syncFiles($req);
    }

    public function edit(array $req)
    {
        $this->updateColumn($req, 'title');
        $this->updateColumn($req, 'barcode');
        $this->updateColumn($req, 'price');
        $this->updateColumn($req, 'sale_price');
        $this->updateColumn($req, 'description');
        $this->updateColumn($req, 'quantity');
        $this->is_active = filter_var($req['is_active'] ?? 'false', FILTER_VALIDATE_BOOLEAN);
        $this->is_new = filter_var($req['is_new'] ?? 'false', FILTER_VALIDATE_BOOLEAN);
        $this->is_recommend = filter_var($req['is_recommend'] ?? 'false', FILTER_VALIDATE_BOOLEAN);
        $this->save();

        $this->syncFiles($req);
    }

    public function remove()
    {
        foreach ($this->productHasImages as $file) {
            deleteFile($file->url);
        }

        $this->productHasImages()->delete();
        $this->delete();
        
        return $this->id;
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
