

<x-site-layout>
    <x-slot name="style">default.css</x-slot>
    <x-slot name="title">{{ __('Plans')  }}</x-slot>

    <section class="tz-membership pt-5">
        <div class="container pt-3">
            <div class="text-center">
                <h2 class="head-title">Create your membership</h2>
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
                                        <span class="list-title">{{ $plan->credit }} Credit</span>
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
                                        <h4 class="price" style="color:#4060AA">
                                            £{{ number_format($plan->price, 0) }} <span>/yearly</span>
                                        </h4>
                                        <span class="list-title">{{ $plan->credit }} Credit</span>
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
