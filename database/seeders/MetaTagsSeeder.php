<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MetaTagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

 
        $pageNames = ['Home', 'About', 'Services', 'Blog', 'Portfolio', 'Videos', 'Testimonials', 'Contact', 'Privacy', 'Terms', 'Products', 'All-rights-reserved'];

        foreach ($pageNames as $pageName) {
            DB::table('meta_tags')->insert([
                'page_name' => $pageName,
                'meta_title' => ucfirst($pageName),
                'meta_description' => "Description for $pageName",
                'meta_keyword' => strtolower($pageName),
                'other_meta_tag' => '',
                // You can customize other fields as needed
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
