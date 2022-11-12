<x-panel-layout>
    <x-slot name="title">{{ __('Admin Orders') }}</x-slot>

    <div class="tm-page-head">
        <h1 class="title">Orders</h1>
    </div>

    <div class="flex-between items-center flex-block-mobile mb-4">
        <ul class="tm-nav-head nav nav-pills">
            <li class="nav-item">
                <a class="nav-link {{ $filter_type == 'store' ? 'active' : '' }}" href="?type=store">Store</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ $filter_type == 'plan' ? 'active' : '' }}" href="?type=plan">Plan</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ $filter_type == 'therapy' ? 'active' : '' }}" href="?type=therapy">Therapy</a>
            </li>
        </ul>
        <div class="d-none">
            <form method="get">
                <div class="input-group mb-1 border">
                    <input type="text" class="form-control" placeholder="Search.." name="q" value="{{ request()->q }}">
                    <button class="btn btn-secondary px-4" type="submit">
                        <i class="ri-search-line"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>

    @if(count($orders) == 0)
        <div class="tm-card tm-card-blank text-center">
            <div class="icon"><i class="ri-user-2-fill"></i></div>
            <h4>You do not have {{ ucwords($filter_type) }} orders</h4>
            <p class="text-5e fs-14">Lorem Ipsum is simply printing and typesetting industry. </p>
        </div>
    @endif

    @foreach($orders as $order)
        <div class="tm-time-item flex-between items-center flex-block-mobile">
            <div class="left flex-start">
                <div class="text">
                    <i class="ri-user-line"></i>
                    <div class="d-block">
                        <p class="mb-1">{{ $order->firstname }} {{ $order->lastname }}</p>
                        <p class="mb-1">{{ $order->email }}</p>
                        @if($order->phone)
                            <p class="mb-1">{{ $order->phone }}</p>
                        @endif
                    </div>
                </div>
            </div>
            @if($order->type == 'plan' && $plan = json_decode($order->products))
                <div class="left2">
                    <div class="text">
                        <i class="ri-shield-user-fill"></i>
                        {{ $plan->name }} - £{{ $plan->price }}
                    </div>
                </div>
            @elseif($order->type == 'therapy' && $service = json_decode($order->products))
                <div class="left2">
                    <div class="text">
                        <i class="ri-shield-user-fill"></i>
                        {{ $service->name }} - £{{ $service->price }}
                        <br> {{ __('Therapist:') }} {{ $service->therapist ?? '-' }}
                    </div>
                </div>
            @else
                <div class="left2" style="max-width: 240px">
                    <div class="text">
                        <i class="ri-map-pin-fill"></i>
                        Address: {{ $order->address }}
                    </div>
                </div>
            @endif
            <div class="left2">
                <div class="text">
                    <i class="ri-money-pound-circle-line"></i>
                    Total: £{{ $order->total }}
                </div>
            </div>
            <div class="left2">
                <div class="text">
                    <i class="ri-calendar-2-line"></i>Date: {{ date('d M Y, H:i', strtotime($order->created_at)) }}
                </div>
            </div>
            @if($order->type == 'store' && $products = json_decode($order->products))
                <div class="right flex-end">
                    <div class="text">
                        <a href="#modalProducts{{$order->id}}" class="btn btn-primary fw-medium br-4" data-bs-toggle="modal" data-bs-target="#modalProducts{{$order->id}}">Products</a>
                    </div>
                </div>
                <div class="modal fade tm-modal-cancel" id="modalProducts{{$order->id}}" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                            <div class="modal-body px-3">
                                <h5 class="mb-3">Order Products</h5>
                                @foreach($products as $product)
                                    <div class="tm-cancel-info row flex-between items-center mb-4">
                                        <div class="col-lg-12 text-small">
                                            Product {{ $loop->index + 1 }}
                                        </div>
                                        <div class="col-lg-8 text-with-icon">
                                            {{ $product->title }}
                                        </div>
                                        <div class="col-lg-4 text-with-icon">
                                            Total: £{{ $product->price }}
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    @endforeach


    {{ $orders->links() }}

</x-panel-layout>
