<x-site-layout>
    <x-slot name="style">home.css</x-slot>
    <x-slot name="title">{{ __('Store') }}</x-slot>

    <section class="tz-page-normal tz-shop">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 mobile-hide">
                    <h2 class="head-title">{{ __('Filter') }}</h2>
                    <div class="tz-filter-box">
                        <h3 class="title">{{ __('Category') }}</h3>
                        <div class="form-check">
                            <label class="form-check-label" for="categoryAll" onclick="window.location.href='?all'">
                                {{ __('store.category_all') }}
                            </label>
                        </div>
                        @foreach($categories as $category)
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="category{{ $loop->index }}" onclick="window.location.href='?category={{$category}}'" {{$checked_category == $category ? 'checked':''}}>
                                <label class="form-check-label" for="category{{ $loop->index }}">
                                    {{ __('store.'.$category) }}
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="col-lg-9">
                    <div class="flex-between">
                        <h2 class="head-title">{{ __('Products') }}</h2>
                        <a href="#modalFilter" data-bs-toggle="modal" data-bs-target="#modalFilter" class="link-filter mobile-show">{{ __('Filter') }} <img src="{{ asset('images/icons/filter-fill.svg') }}" alt="filter"></a>
                    </div>
                    <div class="row mb-4">
                        @foreach($products as $product)
                            <div class="col-md-6 col-lg-6 col-xl-4">
                                <div class="tz-product-box">
                                    <img src="{{ $product->image }}" class="img">
                                    <div class="content">
                                        <h3 class="name">{{ $product->title }}</h3>
                                        <span class="price">£{{ $product->price }}</span>
                                        <a href="{{ route('store.detail', $product->slug) }}" class="btn btn-primary">
                                            <img src="{{ asset('images/icons/shop2.svg') }}" alt="basket" class="primary">
                                            <img src="{{ asset('images/icons/shop-white.svg') }}" alt="basket" class="white">
                                            {{ __('Detail') }}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </section>

    <div class="modal fade" id="modalFilter" tabindex="-1" aria-labelledby="modalFilter" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('Filter') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="tz-filter-box border-bottom-f1">
                        <h3 class="title">{{ __('Category') }}</h3>
                        <div class="form-check">
                            <label class="form-check-label" for="categoryAll" onclick="window.location.href='?all'">
                                {{ __('store.category_all') }}
                            </label>
                        </div>
                        @foreach($categories as $category)
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="category{{ $loop->index }}" onclick="window.location.href='?category={{$category}}'" {{$checked_category == $category ? 'checked':''}}>
                                <label class="form-check-label" for="category{{ $loop->index }}">
                                    {{ __('store.'.$category) }}
                                </label>
                            </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-site-layout>
