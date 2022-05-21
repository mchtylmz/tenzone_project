<x-site-layout>
    <x-slot name="style">default.css</x-slot>
    <x-slot name="title">{{ __('About') }}</x-slot>

    <section class="tz-page">
        <div class="container containerarea2">

            <div class="head-title text-center mb-100">
                <h1>About Us</h1>
                <img src="{{ asset('images/line.svg') }}" alt="line" class="line">
            </div>


            <div class="tz-about-section">
                <div class="row align-items-center">
                    <div class="col-lg-7 order-2 order-sm-2 order-lg-1">
                        <img src="{{ asset('images/about.png') }}" class="banner-img">
                    </div>

                    <div class="col-lg-5 order-1 order-sm-1 order-lg-2">
                        <div class="content">
                            <h3 class="subtitle">Get To Know About The TEN Academy</h3>
                            <h2 class="title">Learn about our <br>Work Culture at <br>The TEN Academy</h2>
                            <p>Spend some time to visit our website or head office
                                and discover our current courses, enrollment procedure,
                                and registration deadline. We're opening new
                                classes every beginning of each month. </p>
                        </div>
                    </div>
                </div>
            </div>


            <div class="tz-about-section">
                <div class="row align-items-center">
                    <div class="col-lg-5">
                        <div class="content pe-3">
                            <h3 class="subtitle">TOGETHER EXPAND AND GROW</h3>
                            <h2 class="title">Students Enjoy Our Companionship in Teaching.</h2>
                            <p>As learners, people can enjoy great companionship from Tenzone mentors and educators. We can help you develop and grow at your best.</p>
                        </div>
                    </div>

                    <div class="col-lg-7">
                        <div class="tz-about-comments">
                            <div class="left">
                                <div class="tz-ac-box large">
                                    <img src="{{ asset('images/profile2.png') }}" alt="profile">
                                    <p class="text">I love their flexibility. Even when my request is too complicated to hadle. they could still suggest something useful.</p>
                                </div>

                                <div class="tz-ac-box box-text text-start">
                                    <p class="text-box">"Best out of the best in the online coaching field ..."</p>
                                </div>

                            </div>

                            <div class="right">

                                <div class="tz-ac-box star">
                                    <h5 class="point">4.9/5.0</h5>
                                    <div class="stars">
                                        <i class="ri-star-fill"></i>
                                        <i class="ri-star-fill"></i>
                                        <i class="ri-star-fill"></i>
                                        <i class="ri-star-fill"></i>
                                        <i class="ri-star-fill"></i>
                                    </div>
                                    <span class="star-text">700+ Students for 3200+ Sales</span>
                                </div>

                                <div class="tz-ac-box mini">
                                    <img src="{{ asset('images/profile2.png') }}" alt="profile">
                                    <p class="text">I love their flexibility. Even when my request is too complicated to hadle. </p>
                                </div>

                            </div>

                        </div>
                    </div>

                </div>
            </div>


            <div class="tz-about-section">
                <div class="row align-items-center">

                    <div class="col-lg-7 order-2 order-sm-2 order-lg-1">
                        <div class="tz-about-count">
                            <div class="row g-0">

                                <div class="col-6">
                                    <div class="box">
                                        <div class="box-content">
                                            <span class="number" style="color:#EC673B">24+</span>
                                            <span class="text">Total Top Services</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="box">
                                        <div class="box-content">
                                            <span class="number" style="color:#4060AA">27+</span>
                                            <span class="text">Countries</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="box">
                                        <div class="box-content">
                                            <span class="number" style="color:#31645E">98%</span>
                                            <span class="text">Positive Feedback</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="box">
                                        <div class="box-content">
                                            <span class="number" style="color:#DEB343">364+</span>
                                            <span class="text">Usual Users</span>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="col-lg-5 order-1 order-sm-1 order-lg-2">
                        <div class="content ps-3">
                            <h3 class="subtitle">WHAT WE ACHIEVED</h3>
                            <h2 class="title">We generated 2x<br> more online<br> sales in 2021.</h2>
                            <p class="mb-0">Through strategy, design, and planning we build brand identities that connect with your template. We then fine-tune a marketing plan that allows us to laser focus.</p>
                        </div>
                    </div>

                </div>
            </div>

            <div class="tz-about-section pb-3">
                <div class="row align-items-center">

                    <div class="col-lg-5">
                        <div class="content ps-3">
                            <h3 class="subtitle">With Caring and Loving</h3>
                            <h2 class="title">Learn about our
                                <br>Work Culture at
                                <br>The TEN Academy</h2>
                            <p class="mb-0">Spend some time to visit our website or head office
                                and discover our current courses, enrollment procedure,
                                and registration deadline. We're opening new
                                classes every beginning of each month. </p>
                        </div>
                    </div>

                    <div class="col-lg-7">
                        <img src="{{ asset('images/about2.png') }}" alt="about" class="banner-img">
                    </div>

                </div>
            </div>

        </div>
    </section>
</x-site-layout>
