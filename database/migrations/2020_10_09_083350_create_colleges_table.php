<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCollegesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('colleges', function (Blueprint $table) {
            $table->string('college_name');
            $table->unique('college_slug');
            $table->integer('category_id');
            $table->string('ownership');
            $table->longText('college_description');
            $table->longText('college_short_description');
            $table->longText('street');
            $table->string('street');
            $table->string('state');
            $table->string('city');
            $table->integer('post_code');
            $table->integer('contact');
            $table->string('email');
            $table->string('website');
            $table->string('college_image');
            $table->string('college_logo');
            $table->string('meta_name');
            $table->longText('meta_description');
            $table->longText('meta_keyword');
            $table->string('sort_order')->nullable();
            $table->boolean('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('colleges');
    }
}
