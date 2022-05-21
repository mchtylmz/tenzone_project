<?php

namespace Database\Seeders;

use App\Models\Help;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HelpSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Help::create([
            'title'    => 'What are the challenges of Learning Online?',
            'content'  => 'The structure of an online classroom varies, experts say. But generally, online students regularly log in to a learning management system, or LMS, a virtual portal where they can view the syllabus and grades; contact professors, classmates and support services.',
            'category' => 'online_education'
        ]);
        Help::create([
            'title'    => 'What are payment options?',
            'content'  => 'The structure of an online classroom varies, experts say. But generally, online students regularly log in to a learning management system, or LMS, a virtual portal where they can view the syllabus and grades; contact professors, classmates and support services.',
            'category' => 'payments'
        ]);
        Help::create([
            'title'    => 'What are the challenges of Learning Online?',
            'content'  => 'The structure of an online classroom varies, experts say. But generally, online students regularly log in to a learning management system, or LMS, a virtual portal where they can view the syllabus and grades; contact professors, classmates and support services.',
            'category' => 'education'
        ]);
    }
}
