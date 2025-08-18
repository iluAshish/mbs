<?php

namespace Database\Seeders;

use App\Models\SiteInformation;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KeyFeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Replace 'Your Title', 'Your Number', etc., with the actual data you want to seed
        $data = [
            [
                'title' => 'Your Title 1',
                'number' => 'Your Number 1',
                'image' => 'Your Image URL 1',
                'webp_image' => 'Your WebP Image URL 1',
                'image_meta_tag' => 'Your Image Meta Tag 1',
                'sort_order' => 1,
                'status' => 'Active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Your Title 2',
                'number' => 'Your Number 2',
                'image' => 'Your Image URL 2',
                'webp_image' => 'Your WebP Image URL 2',
                'image_meta_tag' => 'Your Image Meta Tag 2',
                'sort_order' => 2,
                'status' => 'Inactive',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Add more entries as needed
        ];

        DB::table('key_features')->insert($data);
    }
}
