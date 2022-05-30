<x-site-layout>
    <x-slot name="style">default.css</x-slot>
    <x-slot name="title">{{ __('Select Available time') }}</x-slot>

    <section class="tz-page">
        <div class="container containerarea">

            <div class="head-title text-center">
                <h1>Select Available time</h1>
                <img src="{{ asset('images/line.svg') }}" alt="line" class="line">
            </div>

            @foreach($times as $time)
                <div class="tz-time-box">
                    <div class="left">
                        <span class="text">
                            <img src="{{asset('images/icons/calendar.svg')}}" alt="calendar">
                            {{ $today }}
                        </span>
                    </div>
                    <div class="mid">
                        <span class="text">
                            <img src="{{asset('images/icons/clock.svg')}}" alt="clock">
                            {{$time}}
                        </span>
                    </div>
                    <div class="right">
                        <a href="{{route('confirm.time', strtotime($time))}}" class="btn btn-outline-primary">Book</a>
                    </div>
                </div>
            @endforeach

        </div>
    </section>
</x-site-layout>
