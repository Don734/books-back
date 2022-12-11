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
        'size',
        'age',
        'binding',
        'cover_link',
        'barcode',
        'price',
        'sale_price',
        'description',
        'quantity',
        'page_count',
        'year',
        'weight',
        'is_active',
        'is_new',
        'is_recommend',
    ];
    
    public static function add(array $req)
    {
        $product = self::create([
            'title' => $req['title'],
            'barcode' => $req['barcode'],
            'size' => $req['size'],
            'age' => $req['age'],
            'binding' => $req['binding'],
            'price' => $req['price'],
            'sale_price' => $req['sale_price'] ?? null,
            'description' => $req['description'] ?? null,
            'quantity' => $req['quantity'],
            'page_count' => $req['page_count'] ?? null,
            'year' => $req['year'] ?? null,
            'weight' => $req['weight'] ?? null,
            'is_active' => filter_var($req['is_active'] ?? 'false', FILTER_VALIDATE_BOOLEAN),
            'is_new' => filter_var($req['is_new'] ?? 'false', FILTER_VALIDATE_BOOLEAN),
            'is_recommend' => filter_var($req['is_recommend'] ?? 'false', FILTER_VALIDATE_BOOLEAN) ?? null,
        ]);

        $product->coverFile($req);
        $product->syncFiles($req);
    }

    public function edit(array $req)
    {
        $this->updateColumn($req, 'title');
        $this->updateColumn($req, 'size');
        $this->updateColumn($req, 'age');
        $this->updateColumn($req, 'binding');
        $this->updateColumn($req, 'barcode');
        $this->updateColumn($req, 'price');
        $this->updateColumn($req, 'sale_price');
        $this->updateColumn($req, 'description');
        $this->updateColumn($req, 'quantity');
        $this->updateColumn($req, 'page_count');
        $this->updateColumn($req, 'year');
        $this->updateColumn($req, 'weight');
        $this->is_active = filter_var($req['is_active'] ?? 'false', FILTER_VALIDATE_BOOLEAN);
        $this->is_new = filter_var($req['is_new'] ?? 'false', FILTER_VALIDATE_BOOLEAN);
        $this->is_recommend = filter_var($req['is_recommend'] ?? 'false', FILTER_VALIDATE_BOOLEAN);
        $this->save();

        $this->coverFile($req);
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

    public function coverFile(array $req)
    {
        if (Arr::has($req, 'cover_image')) {
            if (!filled($this->cover_link)) {
                $coverImage = uploadFile($req['cover_image'], 'Product/Cover', $this->id);
                $this->update(['cover_link' => $coverImage]);
            } else {
                deleteFile($this->cover_link);
                $coverImage = uploadFile($req['cover_image'], 'Product/Cover', $this->id);
                $this->update(['cover_link' => $coverImage]);
            }
        }

        if (Arr::has($req, 'cover_delete')) {
            deleteFile($this->cover_link);
            $this->update(['cover_link' => null]);
        }
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
