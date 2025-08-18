<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('short_url')->nullable();
            $table->string('sub_title')->nullable();
            $table->date('posted_date')->nullable();
            $table->string('written_by')->nullable();
            $table->longText('image')->nullable();
            $table->longText('image_webp')->nullable();
            $table->string('image_attribute')->nullable();
            $table->longText('description')->nullable();
            $table->text('video_url')->nullable();
            $table->longText('video_thumbnail_image')->nullable();
            $table->longText('video_thumbnail_image_webp')->nullable();
            $table->string('video_thumbnail_attribute')->nullable();
            $table->longText('alternate_description')->nullable();
            $table->string('banner_title')->nullable();
            $table->string('banner_sub_title')->nullable();
            $table->longText('banner_image')->nullable();
            $table->longText('banner_image_webp')->nullable();
            $table->string('banner_image_attribute')->nullable();
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->string('meta_keyword')->nullable();
            $table->string('other_meta_tag')->nullable();
            $table->enum('status', ['Active', 'Inactive'])->default('Active');
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
        Schema::dropIfExists('blogs');
    }
}
