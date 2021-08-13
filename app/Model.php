<?php

namespace App;

use FunctionalCoding\Illuminate\Model as BaseModel;

class Model extends BaseModel
{
    public function newCollection(array $models = [])
    {
        return new Collection($models);
    }

    public function newEloquentBuilder($query)
    {
        return new Query($query);
    }
}
