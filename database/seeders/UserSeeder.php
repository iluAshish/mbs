<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            [
                'name' => 'Admin',
                'email' => 'admin@cms.com',
                'username' => 'admin',
                'password' => Hash::make('admin'),
                'phone' => '1122334455',
                'profile_image' => null,
                'profile_image_webp' => null,
                'image_attribute' => null,
                'status' => 'Active',
                'token' => null,
                'email_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
