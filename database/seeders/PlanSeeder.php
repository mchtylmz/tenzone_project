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
            'price'       => 15,
            'status'      => 'active',
            'stripe_plan' => 'price_1L2AMQF1efQtdFH9LmWzyqWl'
        ]);
        Plan::create([
            'slug'        => 'plan-2',
            'name'        => 'Plan 2',
            'price'       => 20,
            'status'      => 'active',
            'stripe_plan' => 'price_1L2AMbF1efQtdFH9wo3r7eFx'
        ]);
        Plan::create([
            'slug'        => 'plan-3',
            'name'        => 'Plan 3',
            'price'       => 24,
            'status'      => 'active',
            'stripe_plan' => 'price_1L7JOAF1efQtdFH9xlcB0NVw'
        ]);

        Plan::create([
            'slug'        => 'plan-1-1',
            'name'        => 'Plan 1  - Yıllık',
            'price'       => 12 * 12,
            'type'        => 'yearly',
            'status'      => 'active',
            'stripe_plan' => 'price_1L2AV0F1efQtdFH98LsreDps'
        ]);
        Plan::create([
            'slug'        => 'plan-2-2',
            'name'        => 'Plan 2 -  Yıllık',
            'price'       => 16 * 12,
            'type'        => 'yearly',
            'status'      => 'active',
            'stripe_plan' => 'price_1L7JPJF1efQtdFH9KAWo8R2Q'
        ]);
        Plan::create([
            'slug'        => 'plan-3-3',
            'name'        => 'Plan 3  - Yıllık',
            'price'       => 21 * 12,
            'type'        => 'yearly',
            'status'      => 'active',
            'stripe_plan' => 'price_1L7JOnF1efQtdFH901CvEtkb'
        ]);
    }
}
