<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServicesSeeder extends Seeder
{
    public function run(): void
    {
        $services = [
            [
                'icon' => 'chart',
                'title' => 'Business Intelligence & Power BI Dashboards',
                'description' => 'Executive dashboards that translate raw operational data into precise, decision-ready intelligence for boards, ministries, and C-suite leadership.',
            ],
            [
                'icon' => 'compass',
                'title' => 'Feasibility Studies',
                'description' => 'Bankable feasibility studies covering market sizing, technical viability, financial modeling, and risk assessment — engineered for institutional decision-making.',
            ],
            [
                'icon' => 'search',
                'title' => 'Market Research',
                'description' => 'Quantitative and qualitative market intelligence: sector deep-dives, competitor benchmarks, demand forecasting, and entry-strategy validation.',
            ],
            [
                'icon' => 'document',
                'title' => 'Executive Reports & Presentations',
                'description' => 'High-stakes pitch decks, board reports, and investor memorandums crafted with narrative discipline and visual precision.',
            ],
            [
                'icon' => 'calendar',
                'title' => 'Corporate Event & Exhibition Planning',
                'description' => 'End-to-end planning of B2B, DTC, and B2G exhibitions — from concept and budgeting to ROI measurement across local and international stages.',
            ],
            [
                'icon' => 'sparkle',
                'title' => 'Brand Establishment & Strategy',
                'description' => 'Launching brands from scratch: positioning, identity, go-to-market, and the operational backbone to scale across multiple channels.',
            ],
        ];

        foreach ($services as $i => $row) {
            Service::updateOrCreate(
                ['title' => $row['title']],
                array_merge($row, ['order' => $i + 1, 'active' => true])
            );
        }
    }
}
