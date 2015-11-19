<?php

function flash($title = null, $message = null)
{
    $flash = app('App\Http\Flash');

    if (func_num_args() == 0) {
        return $flash;
    }

    return $flash->info($title, $message);
}

function app_settings($key = null)
{
    $appSettings = app('App\Storage\AppSettingRepositoryInterface');

    return $key ? $appSettings->get($key) : $appSettings;
}

function image($src, $htmlOptions = array(), $noImageSrc = null)
{
    $additionalHtml = '';
    foreach ($htmlOptions as $k => $v) {
        $additionalHtml .= ' ' . $k . '="' . $v . '"';
    }
    if (file_exists(public_path($src))) {
        return '<img src="' . $src . '"' . $additionalHtml . ($noImageSrc ? ' onerror=\'this.src="' . $noImageSrc . '"\'' : '') . '>';
    }
    if ($noImageSrc) {
        return '<img src="' . $noImageSrc . '" width="50">';
    }

    return false;
}

?>