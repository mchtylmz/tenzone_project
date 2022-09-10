<x-panel-layout>
    <x-slot name="title">{{ __('Connect Home') }}</x-slot>

    <div class="tm-page-head">
        <h1 class="title">Connect</h1>
        <p class="text mb-0">You can see your scheduled programs here.</p>
    </div>

    <div class="mb-4">
        <a href="{{ route('parent.book.teachers') }}" class="btn btn-primary with-icon px-4 br-4">
            <i class="ri-calendar-2-fill"></i> Book new appointment
        </a>
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
                    <a href="#modalCancel{{$connect->id}}" class="btn btn-light fw-medium br-4" data-bs-toggle="modal"
                       data-bs-target="#modalCancel{{$connect->id}}">Cancel Meeting</a>
                    @if($connect->meet_link)
                        <a target="_blank" href="{{ $connect->meet_link }}"
                           class="btn btn-primary fw-medium ms-3 br-4 btn-join">
                            Join
                        </a>
                    @else
                        <a class="btn btn-primary fw-medium ms-3 br-4 btn-join" disabled>
                            {{ __('Waiting Link') }}
                        </a>
                    @endif
                    <x-modal_cancel id="{{$connect->id}}"
                                    date="{{ date('d M Y, l', strtotime($connect->meet_date)) }}"
                                    time="{{ date('H:i', strtotime($connect->meet_time)) }}"/>
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
