<x-panel-layout>
    <x-slot name="title">{{ __('Booking ' . $therapist->fullname) }}</x-slot>

    <div class="tm-page-head">
        <h1 class="title">Booking {{ $therapist->fullname }}</h1>
        <p class="text mb-0">You can see your scheduled bookibg here.</p>
    </div>

    @if (session('message'))
        <div class="alert alert-info">{{ session('message') }}</div>
    @endif

    @if(count($connects) == 0)
        <div class="tm-card tm-card-blank text-center">
            <div class="icon"><i class="ri-user-2-fill"></i></div>
            <h4>You do not have Therapy scheduled</h4>
            <p class="text-5e fs-14">Lorem Ipsum is simply printing and typesetting industry. </p>
        </div>
    @endif

    @foreach($connects as $connect)
        <div class="tm-time-item flex-between items-center flex-block-mobile">
            <div class="left flex-start">
                <div class="text">
                    <i class="ri-calendar-2-fill text-main"></i> {{ date('d M Y, l', strtotime($connect->meet_date)) }}
                </div>
            </div>
            <div class="mid">
                <div class="text">
                    <i class="ri-time-line text-main"></i>  {{ date('H:i', strtotime($connect->meet_time)) }}
                </div>
            </div>
            <div class="left2">
                <div class="text">
                    <img src="{!! asset($therapist->image) !!}" alt="profile" class="img-profile">
                    {{ $therapist->fullname }}
                </div>
            </div>
            <div class="right flex-end">

                <a href="#modalBookPayment{{ $connect->id }}" data-bs-target="#modalBookPayment{{ $connect->id }}" data-bs-toggle="modal" class="btn btn-outline-primary btn-block">Book</a>
                <x-modal_bookpayment id="{{ $connect->id }}"
                                     service="{{ $service->id }}"
                                     user="{{ $therapist->id }}"
                                     price="{{ $service->price }}"/>
            </div>
        </div>

    @endforeach

    {{ $connects->links() }}

</x-panel-layout>
