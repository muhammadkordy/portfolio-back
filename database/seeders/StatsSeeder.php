<?php

namespace Database\Seeders;

use App\Models\Stat;
use Illuminate\Database\Seeder;

class StatsSeeder extends Seeder
{
    public function run(): void
    {
        $stats = [
            ['label' => 'Power BI Dashboards Built',                              'value' => '27',   'suffix' => ''],
            ['label' => 'Direct Sales Increase (2025 vs 2024)',                   'value' => '6.7',  'suffix' => '%'],
            ['label' => 'Reduction in Costs & COGS',                              'value' => '-1.28','suffix' => '%'],
            ['label' => 'Marketing Material Efficiency Gain',                     'value' => '16.1', 'suffix' => '%'],
            ['label' => 'Average ROI on Exhibitions (B2B, DTC & B2G)',            'value' => '486',  'suffix' => '%'],
            ['label' => 'Exhibitions Scaled (2024 → 2026)',                       'value' => '21',   'suffix' => ''],
            ['label' => 'Market Research Studies Delivered',                      'value' => '347',  'suffix' => ''],
            ['label' => 'Feasibility Studies Executed',                           'value' => '162',  'suffix' => ''],
            ['label' => 'Websites Launched Across 3 Holding Companies',           'value' => '11',   'suffix' => ''],
            ['label' => 'Brands Established for a Global Textile Leader',         'value' => '3',    'suffix' => ''],
        ];

        foreach ($stats as $i => $row) {
            Stat::updateOrCreate(
                ['label' => $row['label']],
                array_merge($row, ['order' => $i + 1, 'active' => true])
            );
        }
    }
}
