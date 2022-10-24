<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $parent = User::create([
            'name' => 'therapy',
            'surname' => 'therapy',
            'dob' => date('Y-m-d', strtotime('-30 years')),
            'gender' => 'male',
            'email' => 'therapy@therapy.com',
            'password' => Hash::make('12345678')
        ]);
        $parent->syncRoles('therapy');

        $user = User::create([
            'name' => 'admin',
            'surname' => 'suradmin',
            'dob' => date('Y-m-d', strtotime('-20 years')),
            'gender' => 'male',
            'email' => 'admin@admin.com',
            'password' => Hash::make('12345678')
        ]);
        $user->syncRoles('admin');

        $teacher = User::create([
            'name' => 'teacher',
            'surname' => 'teacher',
            'dob' => date('Y-m-d', strtotime('-24 years')),
            'gender' => 'male',
            'email' => 'teacher@teacher.com',
            'password' => Hash::make('12345678')
        ]);
        $teacher->syncRoles('teacher');
        for ($i = 1; $i <= 10; $i++) {
            $day = date('Y-m-d', strtotime($i . ' days'));
            $teacher->meets()->create([
                'meet_date' => $day,
                'meet_time' => '11:00',
                'credit'    => 0
            ]);
            $teacher->meets()->create([
                'meet_date' => $day,
                'meet_time' => '13:00',
                'credit'    => 0
            ]);
            $teacher->meets()->create([
                'meet_date' => $day,
                'meet_time' => '15:00',
                'credit'    => 0
            ]);
            $teacher->meets()->create([
                'meet_date' => $day,
                'meet_time' => '18:00',
                'credit'    => 0
            ]);
        }

        $parent = User::create([
            'name' => 'parent',
            'surname' => 'parent',
            'dob' => date('Y-m-d', strtotime('-30 years')),
            'gender' => 'male',
            'email' => 'parent@parent.com',
            'password' => Hash::make('12345678')
        ]);
        $parent->syncRoles('parent');

        $user = User::create([
            'name' => 'child',
            'surname' => 'child',
            'parent_id' => $parent->id,
            'dob' => date('Y-m-d', strtotime('-18 years')),
            'gender' => 'male',
            'email' => 'child@child.com',
            'password' => Hash::make('12345678')
        ]);
        $user->syncRoles('user');
    }
}
