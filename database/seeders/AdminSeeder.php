<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::insert([
            [
                'user_id' => 1,
                'role' => 'Super Admin',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
