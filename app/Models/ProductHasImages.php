<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class ProductHasImages extends Model
{
    use HasFactory;

    protected $guarded = [];

    public static function add($uploadFile = null, $link = null, $product_id, $user = null)
    {
        $file = self::create([
            'product_id' => $product_id,
            'url' => ($uploadFile != null) ? uploadFile($uploadFile, 'Product/Files', $product_id) : null,
            'link' => $link ?? null,
            'name' => ($uploadFile != null) ? $uploadFile->getClientOriginalName() : null,
            'size' => ($uploadFile != null) ? $uploadFile->getSize() : null,
            'ext' => ($uploadFile != null) ? $uploadFile->extension() : null,
            'height' => ($uploadFile != null) ? getimagesize($uploadFile)[0] : null,
            'width' => ($uploadFile != null) ? getimagesize($uploadFile)[1] : null,
            'userable_id' => $user->id ?? null,
            'userable_type' => $user ? get_class($user) : null,
        ]);
        return $file;
    }

    public function userable()
    {
        return $this->morphTo();
    }
}
