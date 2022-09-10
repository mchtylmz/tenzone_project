<x-site-layout>
    <x-slot name="style">default.css</x-slot>
    <x-slot name="title">{{ __('Help') }}</x-slot>

    <section class="tz-page">
        <div class="container containerarea">

            <div class="head-title text-center mb-100">
                <h1>{{ __('Frequently asked Questions') }}</h1>
                <img src="{{ asset('images/line.svg') }}" class="line">
            </div>

            @foreach($categories as $category)
                <div class="tz-help-box">
                    <h3 class="tz-help-title">{{ $category }}</h3>
                    <div class="accordion tz-accordion" id="accordion{{ str_slug($category) }}">
                        @foreach($faqs as $faq)
                            @if(str_slug($faq->category) == str_slug($category))
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="h{{$faq->id}}" data-bs-toggle="collapse" data-bs-target="#c{{$faq->id}}" aria-expanded="false" aria-controls="c{{$faq->id}}">
                                        <span>{{ $faq->title }}</span>
                                        <i class="fa fa-plus" id="closed"></i>
                                        <i class="fa fa-minus" id="opened"></i>
                                    </h2>
                                    <div id="c{{$faq->id}}" class="accordion-collapse collapse" data-bs-parent="#accordion{{ str_slug($category) }}">
                                        <div class="accordion-body">
                                            {{ $faq->content }}
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </section>
</x-site-layout>
