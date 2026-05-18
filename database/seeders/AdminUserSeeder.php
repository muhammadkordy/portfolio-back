<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => env('ADMIN_EMAIL', 'muhammadkordy98@gmail.com')],
            [
                'name' => 'Muhammad Kordy',
                'password' => Hash::make(env('ADMIN_PASSWORD', 'Admin@12345')),
            ]
        );
    }
}
