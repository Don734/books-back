<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Traits\EloquentHelper;

class Blog extends Model
{
    use HasFactory, EloquentHelper;

    protected $fillable = [
        'title',
        'slug',
        'text',
        'cover_link',
        'is_active',
    ];

    public static function add(array $req)
    {
        $category = self::create([
            'title' => $req['title'],
            'slug' => Str::slug($req['title']),
            'text' => $req['text'] ?? null,
            'is_active' => filter_var($req['is_active'] ?? 'false', FILTER_VALIDATE_BOOLEAN),
        ]);

        $category->coverFile($req);
    }

    public function edit(array $req)
    {
        $this->updateColumn($req, 'title');
        $this->updateColumn($req, 'text');
        $this->slug = Str::slug($req['title']);
        $this->is_active = filter_var($req['is_active'] ?? 'false', FILTER_VALIDATE_BOOLEAN);
        $this->save();

        $this->coverFile($req);
    }

    public function remove()
    {
        deleteFile($this->cover_link);
        $this->delete();
        return $this->id;
    }

    public function coverFile(array $req)
    {
        if (Arr::has($req, 'cover_image')) {
            if (!filled($this->cover_link)) {
                $coverImage = uploadFile($req['cover_image'], 'Blog/Cover', $this->id);
                $this->update(['cover_link' => $coverImage]);
            } else {
                deleteFile($this->cover_link);
                $coverImage = uploadFile($req['cover_image'], 'Blog/Cover', $this->id);
                $this->update(['cover_link' => $coverImage]);
            }
        }

        if (Arr::has($req, 'cover_delete')) {
            deleteFile($this->cover_link);
            $this->update(['cover_link' => null]);
        }
    }
}
