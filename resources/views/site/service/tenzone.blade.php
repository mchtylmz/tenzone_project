<x-site-layout>
    <x-slot name="style">default.css</x-slot>
    <x-slot name="title">{{ $service->name  }}</x-slot>

    <div class="tz-banner">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5">
                    <div class="content">
                        <h1 class="title">{{ $service->name }}..</h1>
                        <p class="text">The TENzone app has been created to assist you with the Zones of Regulation. 
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



    <section style="margin-top:140px;margin-bottom:90px">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <h2 class="head-title pb-2 inline-block">{{ __('What are the Zones of Regulation?
') }}</h2>

                <div class="col-lg-6 mt-4 relative academy-link" >
                    <div class="academy bg-academy-1">
                        <h5 class="title font-weight-light mt-2">{{ __('Blue Zone') }}</h5>
                        <span>{{ __('Feelings: Sick, sad, tired, bored, and moving slowly.
What might help you? Talk to someone, walk, listen to music, or draw.
') }}</span>
                        <div class=" btn-academy">
                            
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 mt-4 relative academy-link">
                    <div class="academy-2  bg-academy-4 ">
                        <h5 class="title font-weight-light mt-2">{{ __('Yellow Zone') }}</h5>
                        <span>{{ __('Feelings: Frustrated, worried, nervous, anxious, silly, and excited.
What might help you? Talk to someone, do breathing exercises, draw, or play with a squeezy toy.

') }}</span>
                        <div class=" btn-academy">
                            
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 relative academy-link mt-4">
                    <div class="academy bg-academy-2">
                        <h5 class="title font-weight-light mt-2">{{ __('Red Zone') }}</h5>
                        <span>{{ __('Feelings: Mad/ angry, mean, shouting, aggressive, scared, and not ready to learn. 
What might help you? Find a safe quiet place, do breathing exercises, play with a friend, or have a snack.
') }}</span>
                    </div>

                    <div class=" btn-academy">
                        
                    </div>
                </div>

                <div class="col-lg-6 relative academy-link mt-4">
                    <div class="academy-2 bg-academy-3">
                        <h5 class="title font-weight-light mt-2">{{ __('Green Zone') }}</h5>
                        <span>{!! __('Feelings: Happy, calm, focused, and ready to learn.
<br>
There are numerous activities to do when in these zones, and some may not apply to everyone. However, our app offers a wide range of games and activities for each zone that will support you in returning to the green zone. Our app also allows you to set timers to encourage the user to return to their work or activity that they were doing before. 
') !!}</span>
                    </div>
                    <div class=" btn-academy">
                        
                    </div>
                </div>
            </div>

        </div>
    </section>
    


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


    <section class="tz-what mobile-show">
        <div class="container">
            <h2 class="head-title">What you get?</h2>
            <div class="owl-carousel owl-theme" id="tz-slider-what-mobile">

                @for ($i = 0; $i <4; $i++)
                    <div class="item">
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


    <div class="container">
        <div class="tz-overview2">
            <div class="row">
                <div class="col-lg-8">
                    <div class="content">
                        <h2 class="title">You are not sure about our services</h2>
                        <p>The generated Lorem Ipsum is therefore always free from repetition, injected humour, or
                            non-characteristic words etc.</p>
                        <a href="{{route('book.free')}}" class="btn btn-light">Book a session for free <i class="fa fa-arrow-right"></i></a>
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


</x-site-layout>
