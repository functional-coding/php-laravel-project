<?php

namespace App\Providers;

use ArrayIterator;
use Illuminate\Container\Container;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\Str;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use RegexIterator;

class ModelRelationMapProvider extends \Illuminate\Support\ServiceProvider
{
    public function register()
    {
        $path = Container::getInstance()->path('Models');
        $dir = new RecursiveDirectoryIterator($path);
        $list = new RecursiveIteratorIterator($dir);
        $files = new RegexIterator($list, '/.+\.php$/');
        $types = [];

        foreach ($files as $file) {
            require_once $file->getPathname();
        }

        $classes = new RegexIterator(new ArrayIterator(get_declared_classes()), '/App\\\Models/');

        foreach ($classes as $class) {
            $matches = [];
            $names = [];

            preg_match('/App\\\Models\\\(.*)/', $class, $matches);

            foreach (explode('\\', $matches[1]) as $seg) {
                $names[] = Str::snake($seg);
            }

            $types[implode('/', $names)] = $class;
        }

        Relation::morphMap($types);
    }
}
