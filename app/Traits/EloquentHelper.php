<?php

namespace App\Traits;

use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


trait EloquentHelper {
    public function updateColumn(array $request, string $key, bool $filled = false)
    {
        if (Arr::has($request, $key)) {
            if (!$filled || filled($request[$key])) {
                $this->{$key} = $request[$key];
            }
        }
    }

    public function scopeRetrieve($query, array $request)
    {
        if (Arr::has($request, 'paginate') and $request['paginate']) {
            return $query->select($this->getTable() . '.*')->paginate((Arr::has($request, 'per_page')
                and filled($request['per_page'])
                and is_numeric($request['per_page']))
                ? $request['per_page'] : 10);
        } else {
            return $query->select('*')->limit(1000)->get();
        }
    }
}