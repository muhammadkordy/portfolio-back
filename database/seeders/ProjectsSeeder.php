<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;

class ProjectsSeeder extends Seeder
{
    public function run(): void
    {
        $projects = [
            [
                'title' => 'ECH BI Ecosystem',
                'scope' => 'Designed and deployed an end-to-end Business Intelligence ecosystem at Egyptian Cotton Hub: 27 Power BI dashboards covering sales, operations, marketing, and exhibitions for senior management and the Egyptian Cabinet affiliation.',
                'key_result' => '+6.7% direct sales, -1.28% costs & COGS, +16.1% marketing material efficiency.',
            ],
            [
                'title' => 'Exhibitions Scale-Up Program',
                'scope' => 'Built and led a full exhibitions program spanning B2B, DTC, and B2G stages — from sourcing and budgeting to staging and post-event analytics — scaling activity 5× in two years.',
                'key_result' => '4 exhibitions in 2024 → 21 exhibitions in 2026, with 486% average ROI.',
            ],
            [
                'title' => '3-Brand Launch',
                'scope' => 'Established three new consumer brands from concept to market launch for one of the largest textile factories in the world, including positioning, identity systems, retail rollout, and digital presence.',
                'key_result' => '3 brands launched, 11 websites delivered across 3 holding companies.',
            ],
        ];

        foreach ($projects as $i => $row) {
            Project::updateOrCreate(
                ['title' => $row['title']],
                array_merge($row, ['order' => $i + 1, 'active' => true])
            );
        }
    }
}
