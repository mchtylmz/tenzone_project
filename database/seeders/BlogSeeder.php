<?php

namespace Database\Seeders;

use App\Models\Blog;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Blog::create([
            'user_id'  => 1,
            'slug'     => 'autism-1',
            'title'    => 'Individuals with autism',
            'brief'    => 'Learning and growing together',
            'content'  => 'Welcome to The TEN Academy, we have lots of new and exciting things to share with you.At The TEN Academy, we want to create a safe, engaging, and supportive environment for you to learn and grow. We believe every individual needs to be seen, educated and given a chance to live to their full potential.<br><br>We offer tailored programmes to support your learning by creating work and activity sheets based on your needs and wants to benefit your growth. Our work and activity sheets are designed and created by qualified teachers and experts who follow the national curriculum. We also offer worksheets on everyday activities and life skills to help you develop and gain confidence in these areas. <br><br>Alongside our tailored programme, we have the TENzone app. We understand how hard it can be to overcome feelings, energy, and sensory needs, and so the TENzone app was designed to support you through the Zones of Regulation. Whether you’re feeling angry or happy, the app offers games and activities to help regulate these emotions and move you into the green zone. For more information click on TENzone at the top of our webpage.<br><br>Our TENshop offers a wide range of sensory toys and products to suit everyone\'s needs.<br><br>Again, welcome to The TEN Academy!',
            'minute'   => 20,
            'tags'     => 'tenzone',
            'image'    => null
        ]);

        Blog::create([
            'user_id'  => 1,
            'slug'     => 'families-2',
            'title'    => 'Families',
            'brief'    => 'Resources and support at your fingertips',
            'content'  => 'Welcome to The TEN Academy!<br><br>We offer a range of services for families, from supporting your child/ children through our tailored programmes, therapy and our TENzone app. <br><br>Why join The TEN Academy?<br><br>The TEN Academy understands that not every day is the same and sometimes days can be hard. Our tailored programmes are designed for both your child/ children and you. Our tailored programmes include a variety of useful resources and services, such as video calls with your assigned Education Support team member, weekly and monthly overviews, and much more.<br><br>Is the website user friendly?<br><br>Our website was designed to allow easy navigation from page to page. This is also the case for our portal when subscribed to our tailored programmes. If you do need support, please do not hesitate to contact us. <br><br>How can The TEN Academy help and support you?<br><br>At The TEN Academy, we have created a safe environment that is free of judgment. We want to help you as much as we can, whether that be providing you with useful resources, helping you with further research and most importantly, listening to you. <br><br>We have begun creating communities for you to reach out to others, share experiences, and have your say. We have provided the link below to our Facebook group- <br><br>Our vision for the near future is to hold monthly meet-ups via Zoom. We want these meet-ups to highlight how special you and the children are, share experiences, and make new friends for both families and children.<br><br>Again, welcome to The TEN Academy!',
            'minute'   => 20,
            'tags'     => 'tenzone',
            'image'    => null
        ]);

        Blog::create([
            'user_id'  => 1,
            'slug'     => 'teachers-3',
            'title'    => 'Teachers',
            'brief'    => 'Do you want to make a difference?',
            'content'  => 'At The TEN Academy, we aim to provide each individual with autism and their families with endless support, quality resources and a safe environment. <br><br>The role of a teacher at The TEN Academy has a different name, Education Support. We have chosen this name for the position because it is not your usual teaching role. So, what does the role of an education support member entail? <br><br>Role of an education support member:<br>●	Provide support.<br>●	Create worksheets that meet the needs of each individual under your care.<br>●	Analyse data from work and information submitted to create weekly, monthly and quarterly overviews for each family.<br>●	Participate in video calls with families and individuals. <br><br>For further details of the role, please see the application form below.<br><br>Why join The TEN Academy?<br><br>We strive to create a bright future for everyone, and we need you!<br><br>We want positive, passionate, knowledgeable individuals to join us on our journey. We offer training to support you in several areas and partake in courses regularly as a company. We offer full and part-time hours to suit your needs and life outside of work. <br><br>The future vision of The TEN Academy<br><br>As part of creating a bright future for all, we have plans to open schools, activity centres and much more.',
            'minute'   => 20,
            'tags'     => 'tenzone',
            'image'    => null
        ]);

        Blog::create([
            'user_id'  => 1,
            'slug'     => 'therapists-1',
            'title'    => 'Therapists',
            'brief'    => 'Are you here to help?',
            'content'  => 'The TEN Academy offers a wide range of therapies for individuals with autism and their families. For the complete list, please see TEN Therapy. <br><br>Why join The TEN Academy?<br><br>Here at The TEN Academy, we want to support individuals and their families. To fully support all, we needed to offer therapy sessions that uphold our values, help the growth of the individual, and offer more useful input. We are looking for keen therapists who want to help others and have a positive impact on the lives of the people in your care. <br><br>We offer full and part-time hours to work around your work and out of work life. Our booking system allows you to input times you\'re available, book follow-up sessions, and for you to keep up to date with upcoming sessions. ',
            'minute'   => 20,
            'tags'     => 'tenzone',
            'image'    => null
        ]);
        Blog::factory(20)->create();
    }
}
