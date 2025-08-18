<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomeAboutUsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('home_about_us', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('sub_title')->nullable();
            $table->text('short_description')->nullable();
            $table->text('description')->nullable();
            $table->string('image_title')->nullable();
            $table->text('image')->nullable();
            $table->text('webp_image')->nullable();
            $table->text('image_attribute')->nullable();
            $table->text('alternate_image')->nullable();
            $table->text('alternate_webp_image')->nullable();
            $table->text('alternate_image_attribute')->nullable();
            $table->string('button_text');
            $table->string('button_url')->nullable();
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
        Schema::dropIfExists('home_about_us');
    }
}
