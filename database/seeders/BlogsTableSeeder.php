<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BlogsTableSeeder extends Seeder
{
    public function run()
    {
        // Replace the data with your actual values
        $data = [
            [
                'title' => 'Blog Title 1',
                'short_url' => 'blog-title-1',
                'sub_title' => 'Subtitle for Blog 1',
                'posted_date' => now(),
                'written_by' => 'Author 1',
                'image' => 'blog-image-url-1',
                'image_webp' => 'blog-image-webp-url-1',
                'image_attribute' => 'Blog Image Attribute 1',
                'description' => 'Blog content goes here...',
                'video_url' => 'youtube-video-url-1',
                'video_thumbnail_image' => 'video-thumbnail-image-url-1',
                'video_thumbnail_image_webp' => 'video-thumbnail-image-webp-url-1',
                'video_thumbnail_attribute' => 'Video Thumbnail Attribute 1',
                'alternate_description' => 'Alternate description for Blog 1',
                'banner_title' => 'Banner Title 1',
                'banner_sub_title' => 'Banner Subtitle 1',
                'banner_image' => 'banner-image-url-1',
                'banner_image_webp' => 'banner-image-webp-url-1',
                'banner_image_attribute' => 'Banner Image Attribute 1',
                'meta_title' => 'Meta Title 1',
                'meta_description' => 'Meta Description 1',
                'meta_keyword' => 'Meta Keyword 1',
                'other_meta_tag' => 'Other Meta Tag 1',
                'status' => 'Active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Blog Title 2',
                'short_url' => 'blog-title-2',
                'sub_title' => 'Subtitle for Blog 2',
                'posted_date' => now(),
                'written_by' => 'Author 2',
                'image' => 'blog-image-url-2',
                'image_webp' => 'blog-image-webp-url-2',
                'image_attribute' => 'Blog Image Attribute 2',
                'description' => 'Blog content goes here...',
                'video_url' => 'youtube-video-url-2',
                'video_thumbnail_image' => 'video-thumbnail-image-url-2',
                'video_thumbnail_image_webp' => 'video-thumbnail-image-webp-url-2',
                'video_thumbnail_attribute' => 'Video Thumbnail Attribute 2',
                'alternate_description' => 'Alternate description for Blog 2',
                'banner_title' => 'Banner Title 2',
                'banner_sub_title' => 'Banner Subtitle 2',
                'banner_image' => 'banner-image-url-2',
                'banner_image_webp' => 'banner-image-webp-url-2',
                'banner_image_attribute' => 'Banner Image Attribute 2',
                'meta_title' => 'Meta Title 2',
                'meta_description' => 'Meta Description 2',
                'meta_keyword' => 'Meta Keyword 2',
                'other_meta_tag' => 'Other Meta Tag 2',
                'status' => 'Active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Add more entries as needed
        ];

        DB::table('blogs')->insert($data);
    }
}