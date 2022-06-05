<x-panel-layout>
    <x-slot name="title">{{ __('Booking ' . $teacher->fullname) }}</x-slot>

    <div class="tm-page-head">
        <h1 class="title">Booking {{ $teacher->fullname }}</h1>
        <p class="text mb-0">You can see your scheduled bookibg here.</p>
    </div>

    @if (session('message'))
        <div class="alert alert-info">{{ session('message') }}</div>
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
                    <img src="{!! asset($teacher->image) !!}" alt="profile" class="img-profile">
                    {{ $teacher->fullname }}
                </div>
            </div>
            <div class="right flex-end">
                <a href="#modalBooking{{$connect->id}}" class="btn btn-primary fw-medium br-4" data-bs-toggle="modal" data-bs-target="#modalBooking{{$connect->id}}">Book (1 Credit)</a>
                <x-modal_booking id="{{$connect->id}}"
                                 date="{{ date('d M Y, l', strtotime($connect->meet_date)) }}"
                                 time="{{ date('H:i', strtotime($connect->meet_time)) }}" />
            </div>
        </div>

    @endforeach

    {{ $connects->links() }}

</x-panel-layout>
