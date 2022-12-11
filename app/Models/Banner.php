<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Carbon\Carbon;
use App\Traits\EloquentHelper;

class Banner extends Model
{
    use HasFactory, EloquentHelper;

    protected $fillable = [
        'banner_image_url',
        'url',
        'banner_text',
        'is_active',
        'is_advert',
    ];

    public static function add(array $req)
    {
        $banner = self::create([
            'url' => $req['url'],
            'banner_text' => $req['banner_text'],
            'is_active' => filter_var($req['is_active'] ?? 'false', FILTER_VALIDATE_BOOLEAN),
            'is_advert' => filter_var($req['is_advert'] ?? 'false', FILTER_VALIDATE_BOOLEAN),
        ]);

        $banner->uploadImageBanner($req);

        return $banner;
    }

    public function edit(array $req)
    {
        $this->updateColumn($req, 'url');
        $this->updateColumn($req, 'banner_text');
        $this->is_active = filter_var($req['is_active'] ?? 'false', FILTER_VALIDATE_BOOLEAN);
        $this->is_advert = filter_var($req['is_advert'] ?? 'false', FILTER_VALIDATE_BOOLEAN);
        $this->uploadImageBanner($req);
        $this->save();
    }

    public function remove()
    {
        deleteFile($this->banner_image_url);
        $this->delete();
        
        return $this->id;
    }

    public function uploadImageBanner(array $req)
    {
        if (Arr::has($req, 'image')) {
            if (!filled($this->banner_image_url)) {
                $bannerImage = uploadFile($req['image'], 'Banner/Image', $this->id);
                $this->update(['banner_image_url' => $bannerImage]);
            } else {
                deleteFile($this->banner_image_url);
                $bannerImage = uploadFile($req['image'], 'Banner/Image', $this->id);
                $this->update(['banner_image_url' => $bannerImage]);
            }
        }

        if (Arr::has($req, 'image_delete')) {
            deleteFile($this->banner_image_url);
            $this->update(['banner_image_url' => null]);
        }
    }
}
