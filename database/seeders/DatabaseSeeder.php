<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            AdminUserSeeder::class,
            StatsSeeder::class,
            ServicesSeeder::class,
            ProjectsSeeder::class,
            ClientsSeeder::class,
        ]);
    }
}
