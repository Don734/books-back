<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Traits\EloquentHelper;

class Category extends Model
{
    use HasFactory, EloquentHelper;

    protected $fillable = [
        'title',
        'slug',
        'description',
    ];

    public static function FunctionName(array $req)
    {
        $category = self::create([
            'title' => $req['title'],
            'slug' => Str::slug($req['title']),
            'sale_price' => $req['sale_price'] ?? null,
        ]);

    }
}
