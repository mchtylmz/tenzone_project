<x-panel-layout>
    <x-slot name="title">{{ __('Buy Credit') }}</x-slot>



    <div class="flex-between items-center flex-block-mobile mb-4">
        <div class="tm-page-head mb-0">
            <h1 class="title">Buy Credit</h1>
            <p class="text mb-0">You can see your scheduled credit here.</p>
        </div>
        <ul class="tm-nav-head nav nav-pills">
            <li class="nav-item">
                <a href="?p=monthly" class="nav-link {{ $filter == 'monthly' ? 'active':'' }}" type="button">Monthly</a>
            </li>
            <li class="nav-item">
                <a href="?p=yearly" class="nav-link {{ $filter == 'yearly' ? 'active':'' }}" type="button">Annually</a>
            </li>
        </ul>
    </div>

    <div class="row">

        @foreach($plans as $plan)
            <div class="col-md-6 col-xl-4">
                <div class="tz-pricing" style="min-height: 500px !important;">
                    <h3 class="name">{{ $plan->name }}</h3>
                    <h4 class="price" style="color:#4060AA">
                        £{{ number_format($plan->price, 0) }} <span>/{{ $plan->type }}</span>
                    </h4>
                    <span class="list-title">{{ $plan->credit }} Credit</span>
                    <ul class="list-unstyled">
                        <li>Activity Sheets</li>
                        <li>Worksheets</li>
                        <li>Weekly Feedback</li>
                    </ul>
                    <a href="#modalPayment{{ $plan->id }}" data-bs-target="#modalPayment{{ $plan->id }}" data-bs-toggle="modal" class="btn btn-outline-primary btn-block">Choose</a>
                </div>
                <x-modal_payment id="{{ $plan->id }}"
                                 price="{{ $plan->price }}"/>
            </div>
        @endforeach

    </div>

</x-panel-layout>
