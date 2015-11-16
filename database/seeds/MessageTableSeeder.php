<?php

use Illuminate\Database\Seeder;
use App\Models\Message;

class MessageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Message::truncate();
        if (app()->environment() != 'production') {
            factory(Message::class, 50)->create();
        }
    }
}
