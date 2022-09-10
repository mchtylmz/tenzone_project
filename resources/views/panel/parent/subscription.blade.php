<x-panel-layout>
    <x-slot name="title">{{ __('My Plans') }}</x-slot>

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
                    @if(auth()->user()->plan_id == $plan->id)
                        <a href="#modalCancelPayment{{ $plan->id }}" data-bs-target="#modalCancelPayment{{ $plan->id }}" data-bs-toggle="modal" class="btn btn-danger btn-block">Cancel</a>
                        <x-modal_cancelpayment id="{{ $plan->id }}"
                                         name="{{ $plan->name }}"/>
                    @else
                        <a href="#modalPayment{{ $plan->id }}" data-bs-target="#modalPayment{{ $plan->id }}" data-bs-toggle="modal" class="btn btn-outline-primary btn-block">Choose</a>
                        <x-modal_payment id="{{ $plan->id }}"
                                         price="{{ $plan->price }}"/>
                    @endif
                </div>
            </div>
        @endforeach

    </div>

</x-panel-layout>
