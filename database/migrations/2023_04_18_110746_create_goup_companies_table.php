<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGoupCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('group_companies', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->text('image')->nullable();
            $table->text('image_webp')->nullable();
            $table->text('image_attribute')->nullable();
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
        Schema::dropIfExists('goup_companies');
    }
}
