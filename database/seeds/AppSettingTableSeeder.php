<?php

use Illuminate\Database\Seeder;

class AppSettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Models\AppSetting::truncate();
        $appSettings = [
            [
                'key' => 'email',
                'value' => 'name@example.com',
            ], [
                'key' => 'phone',
                'value' => '123.456.7890',
            ], [
                'key' => 'address',
                'value' => '3481 Melrose Place Beverly Hills, CA 90210',
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
            App\Models\AppSetting::create($appSetting);
        }
    }
}
