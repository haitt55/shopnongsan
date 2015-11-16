<?php

use Illuminate\Database\Seeder;
use App\Models\Page;

class PageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Page::truncate();
        factory(Page::class)->create([
            'title' => 'About',
            'page_title' => 'About us',
            'meta_keyword' => 'about',
            'meta_description' => 'About us',
            'published' => true,
            'template_suffix' => 'about',
        ]);
        factory(Page::class)->create([
            'title' => 'Contact',
            'page_title' => 'Contact us',
            'meta_keyword' => 'contact',
            'meta_description' => 'Contact us',
            'published' => true,
            'template_suffix' => 'contact',
        ]);
    }
}
