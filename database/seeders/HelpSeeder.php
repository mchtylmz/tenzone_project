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
        /*
        $faq = [
            'The TEN Academy' => [
                'What is The TEN Academy ?',
                'Where are you based ?',
                'Who can use the services ?',
                'Can I apply for a job ?',
                'Do you offer training for people ? ',
                'Where can I find upcoming events ?',
                'Where can I find your policies ?'
            ],
            'Tailored programmes' => [
                'What is the difference between each package offered?',
                'Can I pick the Education Support Member?',
                'What happens if I dont use all of my video call credits?',
                'Who can I contact if I need further support?',
                'How do I cancel my membership?',
                'Can I request more work or activities?',
            ],
            'TENshop' => [
                'How long does shipping take?',
                'How do I return products?',
                'I have not received my package yet.',
                'What happens if my order is wrong or incomplete?',
            ],
            'TENtherapy' => [
                'How do I book further sessions?',
                'Can I sit in the sessions?',
                'How much do the sessions cost?',
                'How do I cancel a session?',
            ],
            'Portal' => [
                ' My login does not work.',
                'How do I submit work?',
                'How do I use the portal? - Can have a video that they can watch',
                'When will we receive work?',
            ],
            'Payments' => [
                'When will my payment method be charged?',
                'How do I add a payment method?',
                'Why is my card not working?',
                'How do I make a purchase?',
            ],
            'TENzone' => [
                'Can add once app has launched',
                'Can I have multiple accounts?',
                'What should I do if the app crashes or freezes?',
                'Will the app automatically update?',
            ]
        ];

        foreach ($faq as $cat => $titles) {
            foreach ($titles as $title) {
                Help::create([
                    'title'    => $title,
                    'content'  => 'The structure of an online classroom varies, experts say. But generally, online students regularly log in to a learning management system, or LMS, a virtual portal where they can view the syllabus and grades; contact professors, classmates and support services.',
                    'category' => $cat
                ]);
            }
        }
        */
    }
}
