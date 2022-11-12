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
        'description'
    ];
    
    public static function add(array $req)
    {
        $product = self::create([
            'title' => $req['title'],
            'barcode' => $req['barcode'],
            'price' => $req['price'],
            'description' => $req['description'] ?? null
        ]);

        $product->syncFiles($req);
    }

    public function edit(array $req)
    {
        $this->updateColumn($req, 'title');
        $this->updateColumn($req, 'barcode');
        $this->updateColumn($req, 'price');
        $this->updateColumn($req, 'description');
        $this->save();

        $this->syncFiles($req);
    }

    public function productHasImages()
    {
        return $this->hasMany(ProductHasImages::class);
    }

    public function syncFiles(array $request, $user = null)
    {
        if (Arr::has($request, 'files') and filled($request['files']) and is_array($request['files'])) {
            foreach ($request['files'] as $file) {
                if (Arr::has($file, 'id') and filled($file['id']) and $productHasImage = $this->accidentFiles()->find($file['id'])) {
                    $productHasImage->edit($file);
                } elseif (Arr::has($file, 'file')) {
                    $productHasImage = ProductHasImages::add($file, $this->id, $user);
                }
            }
        }
        if (Arr::has($request, 'files_for_delete') and filled($request['files_for_delete']) and is_array($request['files_for_delete'])) {
            foreach ($request['files_for_delete'] as $file) {
                $productHasImage = ProductHasImages::where('url', $file)->first();
                deleteFile($file);
            }

            $this->productHasImages()->whereIn('url', $request['files_for_delete'])->delete();
        }
    }
}
