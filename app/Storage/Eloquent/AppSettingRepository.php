<?php

namespace App\Storage\Eloquent;

use App\Storage\AppSettingRepositoryInterface;

class AppSettingRepository extends Repository implements AppSettingRepositoryInterface
{
    public function lists()
    {
        $appSettings = $this->model->all();
        $lists = [];
        foreach ($appSettings as $appSetting) {
            $lists[$appSetting->key] = $appSetting->value;
        }

        return $lists;
    }
}
?>