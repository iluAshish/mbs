<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomeVideoBannerTable extends Migration
{
    public function up()
    {
        Schema::create('home_video_banners', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('sub_title')->nullable();
            $table->text('short_description')->nullable();
            $table->text('video')->nullable();
            $table->text('button_text')->nullable();
            $table->text('button_url')->nullable();
            $table->text('image')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('home_video_banners');
    }
}
