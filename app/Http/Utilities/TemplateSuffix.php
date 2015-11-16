<?php namespace App\Http\Utilities;

class TemplateSuffix
{
    protected static $templateSuffixes = [
        'about' => 'pages.about',
        'contact' => 'pages.contact',
    ];

    public static function all() {
        return static::$templateSuffixes;
    }

    public function viewName($templateSuffix) {
        return isset(static::$templateSuffixes[$templateSuffix]) ? static::$templateSuffixes[$templateSuffix] : 'pages.show';
    }

}