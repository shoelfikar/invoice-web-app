<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::factory(10)->create();

        User::create([
            'name' => 'Super Admin',
            'email' => 'admin@superadmin.com',
            'password' => Hash::make('superadmin'),
            'status' => 1,
            'role' => 'SuperAdmin',
            'remember_token' => Str::random(18)
        ]);
    }
}
