<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->integer('parent_id')->nullable();
            $table->string('title')->nullable();
            $table->string('sub_title')->nullable();
            $table->string('short_url')->nullable();
            $table->string('banner_title')->nullable();
            $table->string('banner_sub_title')->nullable();
            $table->string('banner_image')->nullable();
            $table->string('banner_image_webp')->nullable();
            $table->string('banner_image_attribute')->nullable();
            $table->longText('short_description')->nullable();
            $table->longText('description')->nullable();
            $table->longText('alternate_short_description')->nullable();
            $table->longText('alternate_description')->nullable();
            $table->string('image')->nullable();
            $table->string('image_webp')->nullable();
            $table->string('image_attribute')->nullable();
            $table->string('alternate_image')->nullable();
            $table->string('alternate_image_webp')->nullable();
            $table->string('alternate_image_attribute')->nullable();
            $table->string('menu_image')->nullable();
            $table->string('menu_image_webp')->nullable();
            $table->string('menu_image_attribute')->nullable();
            $table->longText('meta_title')->nullable();
            $table->longText('meta_description')->nullable();
            $table->longText('meta_keyword')->nullable();
            $table->longText('other_meta_tag')->nullable();
            $table->integer('sort_order');
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
        Schema::dropIfExists('services');
    }
}
