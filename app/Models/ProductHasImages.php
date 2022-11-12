<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class ProductHasImages extends Model
{
    use HasFactory;

    protected $guarded = [];

    public static function add(array $request, $product_id, $user = null)
    {
        $file = self::create([
            'product_id' => $product_id,
            'url' => $request['url'] ?? (Arr::has($request, 'file') ? uploadFile($request['file'], 'Product/Files', $product_id) : null),
            'name' => $request['name'] ?? (Arr::has($request, 'file') ? $request['file']->getClientOriginalName() : null),
            'size' => $request['size'] ?? (Arr::has($request, 'file') ? $request['file']->getSize() : null),
            'ext' => $request['ext'] ?? (Arr::has($request, 'file') ? $request['file']->extension() : null),
            'height' => $request['height'] ?? null,
            'width' => $request['width'] ?? null,
            'userable_id' => $user->id ?? null,
            'userable_type' => $user ? get_class($user) : null,
        ]);
        return $file;
    }

    public function edit(array $request)
    {
        if (Arr::has($request, 'file')) {
            $this->url = uploadFile($request['file'], 'Product/Files', $this->id);
            $this->ext = $request['file']->extension() ?? $this->ext;
        }

        $this->updateColumn($request, 'url', true);
        $this->updateColumn($request, 'ext');
        $this->save();
    }

    public function userable()
    {
        return $this->morphTo();
    }
}
