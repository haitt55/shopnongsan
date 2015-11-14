<?php

namespace App\Storage;

interface AppSettingRepositoryInterface
{
    public function get($key);

    public function set($key, $value);

    public function has($key);

    public function all();

    public function merge(array $attributes);

    public function __get($key);
}
?>