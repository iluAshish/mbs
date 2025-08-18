<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSectionHeadingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('section_headings', function (Blueprint $table) {
            $table->id();
            $table->string('type')->unique();
            $table->string('title1')->nullable();
            $table->string('title2')->nullable();
            $table->string('sub_title')->nullable();
            $table->longText('description')->nullable();
            $table->text('image')->nullable();
            $table->text('webp_image')->nullable();
            $table->text('image_attribute')->nullable();
            $table->string('button_text')->nullable();
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
        Schema::dropIfExists('section_headings');
    }
}
