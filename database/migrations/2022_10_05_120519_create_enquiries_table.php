<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnquiriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enquiries', function (Blueprint $table) {
            $table->id();
            $table->string('enquiry_type')->nullable();
            $table->string('request_url')->nullable();
            $table->string('name');
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('date_of_appointment')->nullable();
            $table->string('no_of_passengers')->nullable();
            $table->longText('type')->nullable();
            $table->string('product_id')->nullable();
            $table->string('service_id')->nullable();
            $table->string('sub_service_id')->nullable();
            $table->longText('message')->nullable();

            $table->longText('reply')->nullable();
            $table->timestamp('reply_date')->nullable();
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
        Schema::dropIfExists('enquiries');
    }
}
