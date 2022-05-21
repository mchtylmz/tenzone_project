<?php

namespace Database\Seeders;

use App\Models\Store;
use Database\Factories\StoreFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Store::factory(12)->create();
    }
}
