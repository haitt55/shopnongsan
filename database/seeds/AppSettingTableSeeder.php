<?php

use Illuminate\Database\Seeder;
use App\Models\AppSetting;

class AppSettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AppSetting::truncate();
        $appSettings = [
            [
                'key' => 'email',
                'value' => 'cuong@gtk.vn',
            ], [
                'key' => 'phone',
                'value' => '0979.861.547',
            ], [
                'key' => 'address',
                'value' => 'No. 1C, Lane 105/41 Yen Hoa, Cau Giay District, Hanoi',
            ], [
                'key' => 'page_title',
                'value' => 'GCMS',
            ], [
                'key' => 'meta_keyword',
                'value' => '',
            ], [
                'key' => 'meta_description',
                'value' => '',
            ]
        ];
        foreach ($appSettings as $appSetting) {
            AppSetting::create($appSetting);
        }
    }
}
