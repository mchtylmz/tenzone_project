<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        settings()->set('app_name', 'Tenzone');
        settings()->set('site_favicon', 'assets/auth/img/logo-icon.svg');
        settings()->set('site_logo', 'assets/auth/img/logo.svg');
        settings()->save();
    }
}
