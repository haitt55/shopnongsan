<?php namespace App\Http\Utilities;

class CategoryType
{
    protected static $categoryTypes = [
        1 => 'Articles',
    ];

    public static function all()
    {
        return static::$categoryTypes;
    }

}