<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            WhyChooseUsSeeder::class,
            BlogsTableSeeder::class,
            KeyFeatureSeeder::class,
            CategoriesTableSeeder::class,
            ProductGalleriesSeeder::class,
            SiteInformationSeeder::class,
            UserSeeder::class,
            AdminSeeder::class
        ]);
    }
}
