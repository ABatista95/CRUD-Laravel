<?php

namespace App\Classes\Search\Offers\Filters;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class DescriptionFilter
{
    public static function apply(Builder $query, Request $request): Builder
    {
        if($request->description != "") {
            $query->where("description", "like", "%". $request->description ."%");
        }

        return $query;
    }
}
