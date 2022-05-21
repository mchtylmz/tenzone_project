<?php

namespace Database\Seeders;

use App\Models\Plan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Plan::create([
            'slug'        => 'plan-1',
            'name'        => 'Plan 1',
            'month_price' => 15,
            'year_price'  => 11 * 12,
            'status'      => 'active'
        ]);
        Plan::create([
            'slug'        => 'plan-2',
            'name'        => 'Plan 2',
            'month_price' => 20,
            'year_price'  => 15 * 12,
            'status'      => 'active'
        ]);
    }
}
