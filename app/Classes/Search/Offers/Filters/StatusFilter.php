<?php

namespace App\Classes\Search\Offers\Filters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class StatusFilter
{
    public static function apply(Builder $query, Request $request): Builder
    {
        if($request->status_id != "") {
            $query->where("status_id", $request->status_id );
        }

        return $query;
    }
}
