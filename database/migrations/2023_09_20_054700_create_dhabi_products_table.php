<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContainersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('containers', function (Blueprint $table) {
            $table->id();
            $table->string('title', 191);
            $table->longText('category_id');
            $table->longText('description')->nullable();
            $table->longText('thumbnail_image')->nullable();
            $table->longText('thumbnail_image_webp')->nullable();
            $table->longText('thumbnail_image_attribute')->nullable();
            $table->enum('display_to_home', ['Yes', 'No'])->default('No');
            $table->enum('is_featured', ['Yes', 'No'])->default('No');
            $table->enum('status', ['Active', 'Inactive'])->default('Active');
            $table->integer('sort_order')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('containers');
    }
}
