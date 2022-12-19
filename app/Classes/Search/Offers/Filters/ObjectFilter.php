<?php

namespace App\Classes\Search\Offers\Filters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class ObjectFilter
{
    public static function apply(Builder $query, Request $request): Builder
    {
        if($request->object != "") {
            $query->where("object", "like", "%". $request->object ."%");
        }

        return $query;
    }
}
