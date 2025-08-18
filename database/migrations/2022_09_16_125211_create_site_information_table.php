<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiteInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('site_information', function (Blueprint $table) {
            $table->id();


            $table->string('brand_name')->nullable();
            $table->string('call_free')->nullable();
            $table->string('book_on_trip_advisor_url')->nullable();

            $table->string('logo')->nullable();
            $table->string('logo_webp')->nullable();
            $table->string('logo_attribute')->nullable();
            
            $table->string('dashboard_logo')->nullable();
            $table->string('dashboard_logo_webp')->nullable();
            $table->string('dashboard_logo_attribute')->nullable();

            $table->string('footer_logo')->nullable();
            $table->string('footer_logo_webp')->nullable();
            $table->string('footer_logo_attribute')->nullable();

            $table->string('contact_title')->nullable();
            $table->string('contact_sub_title')->nullable();
            $table->string('phone')->nullable();
            $table->string('landline')->nullable();
            $table->string('whatsapp_number')->nullable();
            $table->string('email')->nullable();
            $table->string('alternate_email')->nullable();
            $table->string('email_recipient')->nullable();
            $table->text('working_hours')->nullable();
            $table->text('company_info_footer')->nullable();
            $table->text('copyright')->nullable();

            $table->string('facebook_url')->nullable();
            $table->string('telegram_url')->nullable();
            $table->string('instagram_url')->nullable();
            $table->string('snapchat_url')->nullable();
            $table->string('pinterest_url')->nullable();
            $table->string('linkedin_url')->nullable();
            $table->string('youtube_url')->nullable();
            $table->string('twitter_url')->nullable();
            $table->string('tiktok_url')->nullable();

            $table->longText('footer_location')->nullable();
            $table->longText('google_map')->nullable();
            $table->longText('terms_and_conditions')->nullable();
            $table->longText('privacy_policy')->nullable();

            // seo related
            $table->longText('header_tag')->nullable();
            $table->longText('footer_tag')->nullable();
            $table->longText('body_tag')->nullable();

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
        Schema::dropIfExists('site_information');
    }
}
