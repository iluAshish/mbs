<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductGalleriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'product_id' => 1,
                'media_type' => 'Image',
                'image' => 'path/to/image1.jpg',
                'image_webp' => 'path/to/image1.webp',
                'image_attribute' => 'Image Attribute 1',
                'video_url' => null,
                'sort_order' => 1,
                'status' => 'Active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 1,
                'media_type' => 'Video',
                'image' => 'path/to/image2.jpg',
                'image_webp' => 'path/to/image2.webp',
                'image_attribute' => 'Image Attribute 2',
                'video_url' => 'https://www.youtube.com/watch?v=example',
                'sort_order' => 2,
                'status' => 'Active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Add more data as needed
        ];

        DB::table('product_galleries')->insert($data);
    }
}
