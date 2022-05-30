<x-site-layout>
    <x-slot name="style">default.css</x-slot>
    <x-slot name="title">{{ __('Confirm Book') }}</x-slot>

    <section class="tz-page">
        <div class="container containerarea">

            <div class="head-title text-center">
                <h1>Confirm Book</h1>
                <img src="{{ asset('images/line.svg') }}" alt="line" class="line">
            </div>

            <div class="tz-time-box mb-4">
                <div class="left">
                        <span class="text">
                            <img src="{{asset('images/icons/calendar.svg')}}" alt="calendar">
                            {{ $bookdate }}
                        </span>
                </div>
                <div class="mid">
                        <span class="text">
                            <img src="{{asset('images/icons/clock.svg')}}" alt="clock">
                            {{$booktime}}
                        </span>
                </div>
            </div>

            <form action="{{ route('book.save') }}" method="post" class="form-question">
                @csrf
                <div class="mb-3">
                    <label for="fullname">First Name and Last Name</label>
                    <input type="text" name="fullname" class="form-control" placeholder="Activity Sheets" required>
                </div>

                <div class="mb-3">
                    <label for="email">Email Address</label>
                    <input type="email" name="email" class="form-control" placeholder="Activity Sheets" required>
                </div>

                <div class="mb-3">
                    <label for="phone">Phone Number</label>
                    <input type="text" name="phone" class="form-control" placeholder="Activity Sheets" required>
                </div>

                <input type="hidden" name="time" value="{{$time}}">
                <button type="submit" class="btn btn-primary btn-block btn-icon-hover">
                    Book a session for free <i class="fa fa-arrow-right"></i>
                </button>
            </form>

        </div>
    </section>
</x-site-layout>
