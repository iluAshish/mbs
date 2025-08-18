<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('home_banners', function (Blueprint $table) {
            $table->id();
            $table->string('sub_title')->nullable();
            $table->string('title')->nullable();
            $table->string('main_title')->nullable();
            $table->string('title2')->nullable();
            $table->text('description')->nullable();
            $table->string('button_txt')->nullable();
            $table->string('button_url')->nullable();
            $table->string('image')->nullable();
            $table->string('image_webp')->nullable();
            $table->string('image_attribute')->nullable();
            $table->string('image_title')->nullable();
            $table->string('bg_image')->nullable();
            $table->string('bg_image_webp')->nullable();
            $table->string('bg_image_attribute')->nullable();
            $table->integer('sort_order')->nullable();
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
        Schema::dropIfExists('home_banners');
    }
};
