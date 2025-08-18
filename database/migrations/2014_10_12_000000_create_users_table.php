<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('username')->nullable();
            $table->string('password');
            $table->string('profile_image')->nullable();
            $table->string('profile_image_webp')->nullable();
            $table->string('image_attribute')->nullable();
            $table->enum('status', ['Active', 'Inactive'])->default('Active');
            $table->text('token')->nullable();
            $table->rememberToken();
            $table->timestamp('email_verified_at')->nullable();

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
        Schema::dropIfExists('users');
    }
}
