<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TemplateSeeder extends Seeder
{
    public function run()
    {
        DB::table('templates')->insert([
            [
                'name' => 'テンプレート①',
                'blade_file' => 'public.simple',
                'preview_image' => '/images/templates/simple.png',
                'preview_url' => '/crops/preview/simple',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'テンプレート②',
                'blade_file' => 'public.fancy',
                'preview_image' => '/images/templates/fancy.png',
                'preview_url' => '/crops/preview/simple',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'コーンテンプレート',
                'blade_file' => 'public.corn',
                'preview_image' => '/images/templates/simple.png',
                'preview_url' => '/crops/preview/{id}/corn',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}