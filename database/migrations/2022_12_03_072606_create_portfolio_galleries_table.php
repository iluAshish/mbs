<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePortfolioGalleriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('portfolio_galleries', function (Blueprint $table) {
            $table->id();
            $table->integer('portfolio_id');
            $table->text('image')->nullable();
            $table->text('image_webp')->nullable();
            $table->text('image_attribute')->nullable();
            $table->text('video_url')->nullable();
            $table->integer('sort_order');
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
        Schema::dropIfExists('portfolio_galleries');
    }
}
