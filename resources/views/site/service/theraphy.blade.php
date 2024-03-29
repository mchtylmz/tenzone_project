<x-site-layout>
    <x-slot name="style">default.css</x-slot>
    <x-slot name="title">{{ $service->name  }}</x-slot>

    <div class="tz-banner">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5">
                    <div class="content">
                        <h1 class="title">{{ $service->name }}..</h1>
                        <p class="text">TEN Therapy offers a range of therapies to suit everyone's needs.

</p>
                        <a href="{{route('book.free')}}" class="btn btn-primary">Book a session for free</a>
                    </div>
                </div>


                <div class="col-lg-6">
                    <img src="{{ asset('images/images.png') }}" alt="images" class="mt-4 mb-4 mobile-show">
                    <div class="position-relative tz-banner-animation mobile-hide">
                        <img src="{{ asset('images/animation/ellipse1.svg') }}" alt="img" class="flip-diagonal-2-br">
                        <img src="{{ asset('images/animation/img1.svg') }}" alt="img" class="anima-top anima-top1">
                        <img src="{{ asset('images/animation/pyramid.svg') }}" alt="img" class="anima-bottom">
                        <img src="{{ asset('images/animation/img2.svg') }}" alt="img" class="slide-tl">
                        <img src="{{ asset('images/animation/img3.svg') }}" alt="img" class="anima-top anima-top2">
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="container">
        <div class="tz-overview">
            <img src="{{ asset('images/line.png') }}" alt="line" class="line">
            <h2 class="title">Overview</h2>
            <p class="text mb-0">TEN Therapy offers a range of therapies to suit everyone's needs. We are currently offering the Early Start Denver Model (ESDM) but will continue to add to our catalogue of therapies. 
</p>
        </div>
    </div>

<!--
    <section class="tz-how">
        <div class="container"><h2 class="head-title">How it works</h2></div>
        <div class="container-fluid">
            <div class="owl-carousel owl-theme" id="tz-slider-how">
                <div class="item">
                    <div class="tz-how-box one">
                        <div class="number">
                            <img src="{{ asset('images/icons/1.svg') }}" alt="1">
                            <span style="color:#4060AA">1</span>
                        </div>

                        <div class="content">
                            <h3 class="title">Content</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet,
                                consectetur adipiscing elit.</p>
                        </div>
                    </div>
                </div>


                <div class="item">
                    <div class="tz-how-box two">
                        <div class="number">
                            <img src="{{ asset('images/icons/2.svg') }}" alt="1">
                            <span style="color:#EC673B">2</span>
                        </div>

                        <div class="content">
                            <h3 class="title">Content</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet,
                                consectetur adipiscing elit.</p>
                        </div>
                    </div>
                </div>


                <div class="item">
                    <div class="tz-how-box three">
                        <div class="number">
                            <img src="{{ asset('images/icons/3.svg') }}" alt="1">
                            <span style="color:#224644">3</span>
                        </div>

                        <div class="content">
                            <h3 class="title">Content</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet,
                                consectetur adipiscing elit.</p>
                        </div>
                    </div>
                </div>


                <div class="item">
                    <div class="tz-how-box four">
                        <div class="number">
                            <img src="{{ asset('images/icons/4.svg') }}" alt="1">
                            <span style="color:#DEB343">4</span>
                        </div>

                        <div class="content">
                            <h3 class="title">Content</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet,
                                consectetur adipiscing elit.</p>
                        </div>
                    </div>
                </div>


                <div class="item">
                    <div class="tz-how-box five">
                        <div class="number">
                            <img src="{{ asset('images/icons/5.svg') }}" alt="1">
                            <span style="color:#5D5FEF">5</span>
                        </div>

                        <div class="content">
                            <h3 class="title">Content</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet,
                                consectetur adipiscing elit.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>


    <section class="tz-what mobile-hide">
        <div class="container">
            <h2 class="head-title">What you get?</h2>
            <div class="row">
                @for ($i = 0; $i <4; $i++)
                    <div class="col-lg-6">
                        <div class="tz-blog-box">
                            <img src="{{ asset('images/blog.png') }}" alt="blog">
                            <div class="content">
                                <span class="tags">Education</span>
                                <h3 class="title">Weeklyly Activity plans</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet,
                                    consectetur adipiscing elit.</p>
                            </div>
                        </div>
                    </div>
                @endfor

            </div>
        </div>
    </section>

-->
    <section class="tz-how">
        <div class="container">
            <h2 class="head-title text-center">What is ESDM?
</h2>
            
           <h5>The Early Start Denver Model (ESDM) is a behavioural therapy for children with autism from the ages of 1 to 5. It is based on the methods of applied behaviour analysis (ABA). The intervention therapy is play-based to help support building positive relationships. Through play, children are encouraged to interact and communicate, which helps boost language, cognitive and social skills.
<br><br>
Meet our ESDM therapist, Georgianna Moraitopoulou.
<br><br>
 <center>
     “ I am a fully certified therapist on the Early Start Denver Model (ESDM), a comprehensive and naturalistic play-based early intervention therapy for children ages 1-5 years old. With an undergraduate degree in Psychology (Aristotle University of Thessaloniki), I then completed my postgraduate studies in Developmental Psychology and Psychopathology (MSc) at King’s College London. In 2019 I developed an interest in autism and I have been working with families and their children ever since. I provide an assessment of the child’s strengths and needs based on the ESDM Curriculum Checklist based on which I construct the child’s program (teaching objectives) taking into account the parents’ wishes. Quarterly assessments of the child’s progress, as well as weekly guidance for parents on the therapy, are part of the intervention process. My motto is to “find the smile” in children since the motivation and outcomes in learning are stronger when the process is fun. I will be soon acquiring a certification in Paediatric Autism Communication Therapy (PACT) for training parents on how to interact and teach communication skills to their children with autism
 </center>
</h5>

        </div>
    </section>


    <div class="container">
        <div class="tz-overview2">
            <div class="row">
                <div class="col-lg-8">
                    <div class="content">
                        <h5 class="title" style="font-size: 24px" >The TEN Academy provides an immense variety of services from tailored programmes, therapy sessions, an online shop, and much more.

</h5>
                        <p>You can read our service summaries by hovering over the service or clicking the service for further details. 
                      
<br>
                        Contact us for more information : <a href="mailto:info@thetenacademy.com"><b style="color: white">info@thetenacademy.com</b></a>

</p><!--
                        <a href="{{route('book.free')}}" class="btn btn-light">Book a session for free <i class="fa fa-arrow-right"></i></a>-->
                    </div>
                </div>

                <div class="col-lg-4 mobile-hide">
                    <div class="images">
                        <div class="position-relative">
                            <img src="{{ asset('images/image.png') }}" alt="image" class="img1">
                            <img src="{{ asset('images/image2.png') }}" alt="image" class="img2">
                            <img src="{{ asset('images/ellipse1.png') }}" alt="image" class="img3">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!--
    <section class="tz-membership">
        <div class="container">
            <div class="text-center">
                <h2 class="head-title">Upgrade your membership</h2>
                <ul class="tz-membernav nav nav-pills justify-content-center mb-5" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="id-monthly" data-bs-toggle="pill"
                                data-bs-target="#tab-monthly" type="button" role="tab" aria-controls="tab-monthly"
                                aria-selected="true">Monthly
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="id-annually" data-bs-toggle="pill" data-bs-target="#tab-annually"
                                type="button" role="tab" aria-controls="tab-annually" aria-selected="false">Annually
                        </button>
                    </li>
                </ul>
            </div>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="tab-monthly" role="tabpanel">
                    <div class="owl-carousel owl-theme" id="tz-slider-membership">
                        @foreach($plans as $plan)
                            @if($plan->type == 'monthly')
                                <div class="item">
                                    <div class="tz-pricing">
                                        <h3 class="name">{{ $plan->name }}</h3>
                                        <h4 class="price" style="color:#4060AA">£{{ number_format($plan->price, 0) }} <span>/month</span></h4>
                                        <span class="list-title">What You'll Get</span>
                                        <ul class="list-unstyled">
                                            <li>Activity Sheets</li>
                                            <li>Worksheets</li>
                                            <li>Weekly Feedback</li>
                                        </ul>

                                        @auth()
                                            <a href="{{ route('update.plan', $plan->slug) }}" class="btn btn-outline-primary btn-block">
                                                Choose
                                            </a>
                                        @else
                                            <a href="{{ route('register', $plan->slug) }}" class="btn btn-outline-primary btn-block">
                                                Choose
                                            </a>
                                        @endauth
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>

                <div class="tab-pane fade" id="tab-annually" role="tabpanel">
                    <div class="owl-carousel owl-theme" id="tz-slider-membership2">
                        @foreach($plans as $plan)
                            @if($plan->type == 'yearly')
                                <div class="item">
                                    <div class="tz-pricing">
                                        <h3 class="name">{{ $plan->name }}</h3>
                                        <h4 class="price" style="color:#4060AA">£{{ number_format($plan->price / 12, 0) }} <span>/month</span></h4>
                                        <span class="list-title">What You'll Get</span>
                                        <ul class="list-unstyled">
                                            <li>Activity Sheets</li>
                                            <li>Worksheets</li>
                                            <li>Weekly Feedback</li>
                                        </ul>

                                        @auth()
                                            <a href="{{ route('update.plan', $plan->slug) }}" class="btn btn-outline-primary btn-block">
                                                Choose
                                            </a>
                                        @else
                                            <a href="{{ route('register', $plan->slug) }}" class="btn btn-outline-primary btn-block">
                                                Choose
                                            </a>
                                        @endauth
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
-->



</x-site-layout>
