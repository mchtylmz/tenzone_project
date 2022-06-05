<x-panel-layout>
    <x-slot name="title">{{ __('Connect Admin') }}</x-slot>

    <div class="tm-page-head">
        <h1 class="title">Connect</h1>
        <p class="text mb-0">You can see your scheduled programs here.</p>
    </div>

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
            @if($user = $connect->user()->first())
                <div class="left2">
                    <div class="text">
                        <img src="{!! asset($user->image) !!}" alt="profile" class="img-profile">
                        {{ $user->fullname }}
                    </div>
                </div>
            @endif
            @if($teacher = $connect->teacher()->first())
                <div class="left2">
                    <div class="text">
                        <img src="{!! asset($teacher->image) !!}" alt="profile" class="img-profile">
                        {{ $teacher->fullname }}
                    </div>
                </div>
            @endif
            <div class="right flex-end">
                @if(time() <= strtotime($connect->meet_date . ' ' . $connect->meet_time))
                    @if($connect->meet_link)
                        <a target="_blank" href="{{ $connect->meet_link }}" class="btn btn-primary fw-medium ms-3 br-4 btn-join">
                            Join
                        </a>
                    @else
                        <a class="btn btn-primary fw-medium ms-3 br-4 btn-join" disabled="">
                            {{ __('Waiting Link') }}
                        </a>
                    @endif
                @else
                    <a class="btn btn-light fw-medium ms-3 br-4 btn-join" disabled>
                        {{ __('Past Connect') }}
                    </a>
                @endif
            </div>
        </div>

    @endforeach

    {{ $connects->links() }}
</x-panel-layout>
