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
            'slug' => 'tailored',
            'name' => 'Tailored Programme'
        ]);
        Service::create([
            'slug' => 'theraphy',
            'name' => 'TEN Therapy'
        ]);
        Service::create([
            'slug' => 'tenzone',
            'name' => 'TENzone'
        ]);
    }
}
