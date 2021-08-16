<?php

namespace App;

class Query extends \Illuminate\Database\Eloquent\Builder
{
    public function toSqlWithBindings()
    {
        $str = str_replace('?', "'?'", parent::toSql());

        return vsprintf(str_replace('?', '%s', $str), $this->getBindings());
    }
}
