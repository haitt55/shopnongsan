<?php

namespace App\Models;

use App\Models\BaseModel;

class AppSetting extends BaseModel
{
    protected $table = 'app_settings';

    public function scopeKey($query, $key)
    {
        return $query->whereKey($key);
    }

    public function settings()
    {
        $settings = [];
        $appSettings = $this->all();
        foreach ($appSettings as $appSetting) {
            $settings[$appSetting->key] = $appSetting->value;
        }

        return $settings;
    }
}
