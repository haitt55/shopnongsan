<?php namespace App\Http\Utilities;

class TemplateSuffix
{
    protected static $templateSuffixes = [
        'about' => 'page.about',
        'contact' => 'page.contact',
    ];

    public static function all() {
        return static::$templateSuffixes;
    }

}