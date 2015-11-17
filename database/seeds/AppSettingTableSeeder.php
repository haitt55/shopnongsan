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
                'key' => 'name',
                'value' => 'GCMS',
            ],
            [
                'key' => 'company',
                'value' => 'GTK',
            ],
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
                'value' => 'An awesome CMS!',
            ], [
                'key' => 'meta_keyword',
                'value' => 'awesome,cms',
            ], [
                'key' => 'meta_description',
                'value' => 'GCMS is an awesome CMS!',
            ]
        ];
        foreach ($appSettings as $appSetting) {
            AppSetting::create($appSetting);
        }
    }
}
