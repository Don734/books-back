<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\InsertOnDuplicateKey;
use App\Traits\EloquentHelper;

class Config extends Model
{
    use HasFactory, EloquentHelper, InsertOnDuplicateKey;

    const TAB_NAME = 1;
    const BODY_SCRIPT = 2;
    const MAINTENANCE = 3;
    const LOGO_IMAGE = 4;

    public function edit(array $req)
    {
        foreach ($req as $key => $value) {
            $this->where('title', $key)->update([
                'value' => $value
            ]);
        }
    }
}
