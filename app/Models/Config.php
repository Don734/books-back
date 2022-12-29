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
        $this->updateColumn($req, 'first_name');
        $this->updateColumn($req, 'last_name');
        // $this->status = filter_var($req['is_active'] ?? 'false', FILTER_VALIDATE_BOOLEAN);
        $this->save();

        $this->coverFile($req);
    }
}
