<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestimonialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('testimonials', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->bigInteger('service_id')->nullable();
            $table->bigInteger('connectid')->nullable();
            $table->text('designation')->nullable();
            $table->string('location')->nullable();
            $table->string('video_url')->nullable();
            $table->text('message')->nullable();
            $table->string('image')->nullable();
            $table->string('webp_image')->nullable();
            $table->string('image_attribute')->nullable();
            $table->string('author_image')->nullable();
            $table->string('author_image_webp')->nullable();
            $table->string('author_image_attribute')->nullable();
            $table->integer('rating')->default('1');
            $table->enum('review_type', ['Normal', 'Google', "Facebook", "Instagram"])->default('Normal');
            $table->integer('sort_order');
            $table->enum('is_featured', ['Yes', 'No'])->default('No');
            $table->enum('display_to_home', ['Yes', 'No'])->default('No');
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
        Schema::dropIfExists('testimonials');
    }
}
