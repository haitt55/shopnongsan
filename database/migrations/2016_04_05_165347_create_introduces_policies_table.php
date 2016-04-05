<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIntroducesPoliciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('introduces_policies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->mediumText('content')->nullable();
            $table->string('slug');
            $table->text('excerpt')->nullable();
            $table->string('page_title', 70)->nullable();
            $table->string('meta_keyword')->nullable();
            $table->string('meta_description', 160)->nullable();
            $table->boolean('published')->default(true);
            $table->string('image')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('introduces_policies');
    }
}
