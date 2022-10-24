<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \App\Models\TherapyService;

class TherapyServicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TherapyService::create([
            'name' => 'Service 1',
            'description' => 'Service 1 Description',
            'category' => 'category1'
        ]);
        TherapyService::create([
            'name' => 'Service 2',
            'description' => 'Service 2 Description',
            'category' => 'category2'
        ]);
    }
}
