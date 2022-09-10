<x-panel-layout>
    <x-slot name="title">{{ __('Connect Home') }}</x-slot>

    <div class="tm-page-head">
        <h1 class="title">Connect</h1>
        <p class="text mb-0">You can see your scheduled connect here.</p>
    </div>

    <div class="mb-4">
        <a href="#modalAvailability" data-bs-toggle="modal" data-bs-target="#modalAvailability" class="btn btn-primary with-icon px-4 br-4"><i class="ri-calendar-2-fill"></i> Set your available times</a>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
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
            @if($user = $connect->user()->first())
                <div class="left2">
                    <div class="text">
                        <img src="{!! asset($user->image) !!}" alt="profile" class="img-profile">
                        {{ $user->fullname }} <br>
                        {{ $user->email }}
                    </div>
                </div>
            @endif
            <div class="right flex-end">
                @if(time() <= strtotime($connect->meet_date . ' ' . $connect->meet_time))
                    <a class="btn btn-warning fw-medium br-1" href="#modalEdit{{$connect->id}}" data-bs-toggle="modal" data-bs-target="#modalEdit{{$connect->id}}">
                        Edit
                    </a>
                    <a href="#modalCancel{{$connect->id}}" class="btn btn-light fw-medium br-4" data-bs-toggle="modal" data-bs-target="#modalCancel{{$connect->id}}">Cancel Meeting</a>
                    @if($connect->meet_link)
                        <a target="_blank" href="{{ $connect->meet_link }}" class="btn btn-opacity-primary2 fw-medium ms-3 br-4 btn-join">
                            Join
                        </a>
                    @endif
                    <x-modal_cancel id="{{$connect->id}}"
                                    date="{{ date('d M Y, l', strtotime($connect->meet_date)) }}"
                                    time="{{ date('H:i', strtotime($connect->meet_time)) }}" />
                    <x-modal_edit id="{{$connect->id}}"
                                  date="{{ date('Y-m-d', strtotime($connect->meet_date)) }}"
                                  time="{{ date('H:i', strtotime($connect->meet_time)) }}" />
                @else
                    <a class="btn btn-light fw-medium ms-3 br-4 btn-join" disabled>
                        {{ __('Past Connect') }}
                    </a>
                @endif
            </div>
        </div>

    @endforeach

    {{ $connects->links() }}


    <div class="modal fade" id="modalAvailability" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <h4 class="mb-3">Your availability</h4>
                    <form action="{{ route('teacher.meet.availability') }}" method="post" class="loading">
                        @csrf

                        <div class="mb-3">
                            <label>Select Date</label>
                            <input type="text" name="date" class="form-control datepicker" autocomplete="off" placeholder="YYYY-MM-DD" required>
                        </div>

                        <div class="mb-3">
                            <label>Select time</label>
                            <div class="accordion-item">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#acEndDate" aria-expanded="false" aria-controls="acEndDate">
                                    Select time
                                </button>
                                <div id="acEndDate" class="accordion-collapse collapse" data-bs-parent="#acEndDate">
                                    <div class="accordion-body">
                                        <div class="btn-group tm-btn-group" role="group">

                                            <input type="checkbox" class="btn-check" name="time[]" id="time1" autocomplete="off" value="11:00">
                                            <label class="tm-checkbtn btn btn-light btn-48 fw-light mb-1" for="time1">11:00</label>

                                            <input type="checkbox" class="btn-check" name="time[]" id="time2" autocomplete="off" value="13:00">
                                            <label class="tm-checkbtn btn btn-light btn-48 fw-light mb-1" for="time2">13:00</label>

                                            <input type="checkbox" class="btn-check" name="time[]" id="time3" autocomplete="off" value="15:00">
                                            <label class="tm-checkbtn btn btn-light btn-48 fw-light mb-1" for="time3">15:00</label>

                                            <input type="checkbox" class="btn-check" name="time[]" id="time4" autocomplete="off" value="18:00">
                                            <label class="tm-checkbtn btn btn-light btn-48 fw-light mb-1" for="time4">18:00</label>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <button type="submit" class="btn btn-primary btn-block">Add</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-panel-layout>
