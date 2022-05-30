<x-site-layout>
    <x-slot name="style">home.css</x-slot>
    <x-slot name="menuStyle">transparent</x-slot>
    <x-slot name="title">{{ __('Home') }}</x-slot>

    <div class="tz-banner">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5">
                    <div class="content">
                        <h1 class="title">
                            {{ __('We scratch,') }} <br> {{ __('build and play') }} <br>
                            <span>{{ __('together') }}</span>
                        </h1>
                        <p class="text">
                            {{ __('The TEN Academy is an online platform for individuals with autism and their families') }}
                        </p>
                        <a href="{{route('book.free')}}" id="" class="btn btn-primary">{{ __('Book a session for free') }}</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <img src="{{ asset('images/bg-mobile-home.png') }}" class="mt-4 mb-4 mobile-show">
                    <div class="position-relative tz-banner-animation mobile-hide">
                        <img src="{{ asset('images/animation/ellipse1.svg') }}" style="z-index: 99;"
                             class="flip-diagonal-2-br-home">
                        <img src="{{ asset('images/animation/ellipse2.png') }}" class="flip-diagonal-2-br-2">
                        <img src="{{ asset('images/animation/image-slider-2.png') }}"
                             class="anima-top anima-top-home-1">
                        <img src="{{ asset('images/animation/star.jpg') }}" class="anima-bottom star-pos">
                        <img src="{{ asset('images/animation/image-slider-1.png') }}" class="slide-tl-home">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div style="padding-top: 122px !important; min-height: 550px;">
            <h2 class="title mb-4">{{ __('Services') }}</h2>
            <div class="row mt-3">
                <div class="content-services">

                    <div class="col-lg-4 card">
                        <div class="item-services" style="overflow: hidden; height: 240px;">
                            <div class="tz-how-box one">
                                <img src="{{ asset('images/icons/services/services-icon-1.svg') }}">
                                <span class="block mt-5" style="display: block;">{{ __('Education') }}</span>
                                <h5 class="title font-weight-light mt-2">{{ __('Educational Programs') }}</h5>
                            </div>
                        </div>
                        <div  class="pt-1 pb-5 text">
                            <a href="{{route('book.free')}}" class="btn btn-primary">{{ __('Book Now') }}</a>
                        </div>
                    </div>
                    <!-- end card -->

                    <!-- card -->
                    <div class="col-lg-4 card">
                        <div class="item-services" style="overflow: hidden; height: 240px;">
                            <div class="tz-how-box one">
                                <img src="{{ asset('images/icons/services/services-icon-3.svg') }}" alt="1">
                                <span class="block mt-5" style="display: block;">{{ __('Theraphy') }}</span>
                                <h5 class="title font-weight-light mt-2">{{ __('Theraphy services') }}</h5>
                            </div>
                        </div>
                        <div class="pt-1 pb-5 text">
                            <a href="{{route('book.free')}}" class="btn btn-primary color-but-2">{{ __('Book Now') }}</a>
                        </div>
                    </div>
                    <!-- end card -->

                    <!-- card -->
                    <div class="col-lg-4 card">
                        <div class="item-services" style="overflow: hidden; height: 240px;">
                            <div class="tz-how-box one">
                                <img src="{{ asset('images/icons/services/services-icon-2.svg') }}" alt="1">
                                <span class="block mt-5" style="display: block;">{{ __('Education') }}</span>
                                <h5 class="title font-weight-light mt-2">{{ __('Ten Shop') }}</h5>
                            </div>
                        </div>
                        <div  class="pt-1 pb-5 text" style="">
                            <a href="{{route('book.free')}}" class="btn btn-primary color-but-3">{{ __('Book Now') }}</a>
                        </div>
                    </div>
                    <!-- end card -->
                </div>
            </div>

            <div class="row content-services-mobile">
                <div class="col-12 mt-4 col-lg-4 card">
                    <div class="item-services" style="overflow: hidden; height: 240px;">
                        <div class="tz-how-box one">
                            <img src="{{ asset('images/icons/services/services-icon-1.svg') }}" alt="1">
                            <span class="block mt-5" style="display: block;">{{ __('Education') }}</span>
                            <h5 class="title font-weight-light mt-2">{{ __('Educational Programs') }}</h5>
                        </div>
                    </div>
                    <div class="pt-1 pb-5 text" style="">
                        <a href="{{route('book.free')}}" class="btn btn-primary">{{ __('Book Now') }}</a>
                    </div>
                </div>
                <!-- end card -->

                <!-- card -->
                <div class="col-12 mt-4 col-lg-4 card">
                    <div class="item-services" style="overflow: hidden; height: 240px;">
                        <div class="tz-how-box one">
                            <img src="{{ asset('images/icons/services/services-icon-3.svg') }}" alt="1">
                            <span class="block mt-5" style="display: block;">{{ __('Theraphy') }}</span>
                            <h5 class="title font-weight-light mt-2">{{ __('heraphy services') }}T</h5>
                        </div>
                    </div>
                    <div  class="pt-1 pb-5 text" style="">
                        <a href="{{route('book.free')}}" class="btn btn-primary color-but-2">{{ __('Book Now') }}</a>
                    </div>
                </div>
                <!-- end card -->

                <!-- card -->
                <div class=" col-12 mt-4 col-lg-4 card">
                    <div class="item-services" style="overflow: hidden; height: 240px;">
                        <div class="tz-how-box one">
                            <img src="{{ asset('images/icons/services/services-icon-2.svg') }}" alt="1">
                            <span class="block mt-5" style="display: block;">{{ __('Education') }}</span>
                            <h5 class="title font-weight-light mt-2">{{ __('Ten Shop') }}</h5>
                        </div>
                    </div>
                    <div  class="pt-1 pb-5 text" style="">
                        <a href="{{route('book.free')}}" class="btn btn-primary color-but-3">{{ __('Book Now') }}</a>
                    </div>
                </div>
                <!-- end card -->
            </div>
        </div>
    </div>

    <section class="about-section">
        <div class="container">
            <div class="row" style="padding-right: 15px; overflow: hidden;" id="gallery-hover">
                <div class="col-6 col-lg-3">
                    <div class="relative">
                        <img class="img-fluid" src="{{ asset('images/39.jpg') }}" alt="">
                        <div id="hover-g-image-1">
                            <img class="img-fluid" src="{{ asset('images/41-hover.png') }}">
                        </div>
                    </div>
                </div>

                <div class="col-6 col-lg-3 relative">
                    <div class="relative">
                        <img class="about-img-1" src="{{ asset('images/41.jpg') }}">
                        <div id="hover-g-image-2">
                            <img class="img-fluid" src="{{ asset('images/40-hover.png') }}">
                        </div>
                    </div>

                    <div class="relative">
                        <img class="about-img-2" src="{{ asset('images/40.jpg') }}">
                        <div id="hover-g-image-3">
                            <img class="img-fluid" src="{{ asset('images/39-hover.png') }}">
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 about-text">
                    <div>
                        <h3>{{ __('You are not sure about our services') }}</h3>
                        <p>
                            {{ __(' Lorem Ipsum is simply dummy text of the printing and typesetting industry. <br> Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. <br> The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.') }}

                        </p>
                        <a href="{{route('book.free')}}" class="btn btn-primary btn-about" style="">{{ __('Book a session for free') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="relative">
                <h2 class="head-title mt-120 inline-block">{{ __('Store') }}</h2>
            </div>
            <div class="row mt-4">
                @foreach($products as $product)
                    <div class="col-md-6 col-lg-6 col-xl-4">
                        <div class="tz-product-box home">
                            <img src="{{ $product->image }}" class="img">
                            <div class="content">
                                <a href="{{ route('store.detail', $product->slug) }}" class="text-dark">
                                    <h3 class="name">{{ $product->title }}</h3>
                                </a>
                                <span class="price">£{{ $product->price }}</span>
                                <a href="{{ route('store.detail', $product->slug) }}" class="btn btn-primary">
                                    <img src="{{ asset('images/icons/shop2.svg') }}" alt="basket" class="primary">
                                    <img src="{{ asset('images/icons/shop-white.svg') }}" alt="basket" class="white">
                                    {{ __('Add to Basket') }}
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section style="margin-top:140px;margin-bottom:90px">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <h2 class="head-title pb-2 inline-block">{{ __('Ten Academy For') }}</h2>

                <div class="col-lg-6 mt-4 relative academy-link" >
                    <div class="academy bg-academy-1">
                        <h5 class="title font-weight-light mt-2">{{ __('Autistic Adults') }}</h5>
                        <span>{{ __('Tailored Educational Programs') }}</span>
                        <div class=" btn-academy">
                            <a href="#" class="btn bg-white">{{ __('Learn More') }}</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 mt-4 relative academy-link">
                    <div class="academy-2  bg-academy-2 ">
                        <h5 class="title font-weight-light mt-2">{{ __('Families') }}</h5>
                        <span>{{ __('Tailored Educational Programs') }}</span>
                        <div class=" btn-academy">
                            <a href="#" class="btn bg-white">{{ __('Learn More') }}</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 relative academy-link mt-4">
                    <div class="academy bg-academy-3">
                        <h5 class="title font-weight-light mt-2">{{ __('Teachers') }}</h5>
                        <span>{{ __('Tailored Educational Programs') }}</span>
                    </div>

                    <div class=" btn-academy">
                        <a href="#" class="btn bg-white">{{ __('Learn More') }}</a>
                    </div>
                </div>

                <div class="col-lg-6 relative academy-link mt-4">
                    <div class="academy-2 bg-academy-4">
                        <h5 class="title font-weight-light mt-2">{{ __('Therapists') }}</h5>
                        <span>{{ __('Tailored Educational Programs') }}</span>
                    </div>
                    <div class=" btn-academy">
                        <a href="#" class="btn bg-white">{{ __('Learn More') }}</a>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <section class="pb-5 mb-5">
        <div class="container pt-3">
            <div class="relative pt-4">
                <h2 class="head-title inline-block">{{ __('Blog') }}</h2>
            </div>
            <div class="row mt-4 justify-content-start">
                @foreach($blogs as $blog)
                    <div class="col-lg-4 p-3">
                        <div class="blog-item blog-hover">
                            <div class="relative bg-danger" style="margin-top:36px !important">
                                <img src="{{ $blog->image }}" alt="blog">
                            </div>
                            <div class="content pe-3">
                                <a href="{{ route('blog.detail', $blog->slug) }}">
                                    <h6 class="title text-start text-dark" style="padding-left: 38px !important;">
                                        {{ $blog->title }}
                                    </h6>
                                </a>
                                <a href="{{ route('blog.detail', $blog->slug) }}">
                                    <p class="text-start text-dark" style="padding-left: 38px !important;">
                                        {{ $blog->brief }}
                                    </p>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</x-site-layout>
