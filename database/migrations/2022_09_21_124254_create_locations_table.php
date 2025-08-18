<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('location');
            $table->text('office_address')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('land_phone')->nullable();
            $table->longText('working_hours')->nullable();
            $table->text('email')->nullable();
            $table->text('alternate_email')->nullable();
            $table->text('image')->nullable();
            $table->text('google_map')->nullable();
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
        Schema::dropIfExists('locations');
    }
}
