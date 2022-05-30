<x-site-layout>
    <x-slot name="style">home.css</x-slot>
    <x-slot name="title">{{ $product->title }}</x-slot>

    <section class="tz-page-normal">
        <div class="container">
            <div class="tz-shop-detail">
                <div class="row">
                    <div class="col-lg-5">
                        <img src="{{ $product->image }}" alt="{{ $product->title }}">
                    </div>
                    <div class="col-lg-7">
                        <div class="content">
                            <h1 class="productname">{{ $product->title }}</h1>
                            <div class="stars">
                                @for($i = 1; $i <= 5; $i++)
                                    <img src="{{ asset('images/icons/star.svg') }}" alt="{{$i}}">
                                @endfor
                            </div>

                            <p class="text">
                                {{ $product->content }}
                            </p>
                            <h2 class="price">£{{ $product->price }}</h2>

                            <form action="{{ route('cart.save', $product->id) }}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-primary">
                                    <img src="{{ asset('images/icons/shop-white.svg') }}" alt="{{ $product->title }}">
                                    {{ __('Add to basket') }}
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tz-shop-other">
                <div class="head">
                    <h2 class="head-title">Shop</h2>
                    <a href="{{ route('store') }}" class="link">{{ __('See All') }} <i class="fa fa-arrow-right"></i></a>
                </div>
                <div class="row">
                    @foreach($products as $product)
                        <div class="col-md-6 col-lg-6 col-xl-4">
                            <div class="tz-product-box">
                                <img src="{{ $product->image }}" alt="{{ $product->title }}" class="img">
                                <div class="content">
                                    <h3 class="name">{{ $product->title }}</h3>
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
        </div>
    </section>
</x-site-layout>
