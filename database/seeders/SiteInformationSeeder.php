<?php

namespace Database\Seeders;

use App\Models\SiteInformation;
use Illuminate\Database\Seeder;

class SiteInformationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SiteInformation::create([
            'brand_name' => 'Container Solution',
            'call_free' => null,
            'book_on_trip_advisor_url' => null,
            'email_recipient' => 'projects@pentacodes.com',
            'email' => 'projects@pentacodes.com',
            'alternate_email' => 'projects@pentacodes.com',
            'phone' => '050 753 4313',
            'landline' => '050 753 4313',
            'whatsapp_number' => '050 753 4313',
            'facebook_url' => '#',
            'telegram_url' => '#',
            'instagram_url' => '#',
            'snapchat_url' => '#',
            'pinterest_url' => '#',
            'linkedin_url' => '#',
            'youtube_url' => '#',
            'twitter_url' => '#',
            'tiktok_url' => '#',
            'logo' => null,
            'logo_webp' => null,
            'logo_attribute' => 'alt="main_logo"',
            // Add other fields
        ]);
    }
}
