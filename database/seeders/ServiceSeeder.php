<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Service::create([
            'slug' => 'educational',
            'name' => 'Educational Programs'
        ]);
        Service::create([
            'slug' => 'theraphy',
            'name' => 'Theraphy Services'
        ]);
        Service::create([
            'slug' => 'ten',
            'name' => 'Ten Shop'
        ]);
    }
}
