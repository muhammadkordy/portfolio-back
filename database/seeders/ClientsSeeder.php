<?php

namespace Database\Seeders;

use App\Models\Client;
use Illuminate\Database\Seeder;

class ClientsSeeder extends Seeder
{
    public function run(): void
    {
        $clients = [
            ['name' => 'Egyptian Cotton Hub (ECH)',                  'affiliation_note' => 'Senior management — affiliated with the Egyptian Cabinet'],
            ['name' => 'Cotton & Textile Industries Holding Co.',    'affiliation_note' => 'CTIHC — parent holding company'],
            ['name' => 'Nit Home',                                   'affiliation_note' => 'Brand established under ECH'],
            ['name' => 'MEHALLA Home',                               'affiliation_note' => 'Brand established under ECH'],
            ['name' => 'ECH Care',                                   'affiliation_note' => 'Brand established under ECH'],
            ['name' => 'Egyptian Cabinet',                           'affiliation_note' => 'Government affiliation'],
        ];

        foreach ($clients as $i => $row) {
            Client::updateOrCreate(
                ['name' => $row['name']],
                array_merge($row, ['order' => $i + 1, 'active' => true])
            );
        }
    }
}
