<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutUsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('about_us', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('sub_title')->nullable();
            $table->text('short_description')->nullable();
            $table->text('description')->nullable();
            $table->longText('alternate_description')->nullable();
            $table->text('image')->nullable();
            $table->text('webp_image')->nullable();
            $table->text('image_attribute')->nullable();

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
        Schema::dropIfExists('about_us');
    }
}
