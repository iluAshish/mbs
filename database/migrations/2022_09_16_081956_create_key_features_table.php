<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKeyFeaturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('key_features', function (Blueprint $table) {
            $table->id();

            $table->string('title')->nullable();
            $table->string('number')->nullable();
            $table->longText('description')->nullable();
            $table->longText('image')->nullable();
            $table->longText('webp_image')->nullable();
            $table->string('image_meta_tag')->nullable();
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
        Schema::dropIfExists('key_features');
    }
}
