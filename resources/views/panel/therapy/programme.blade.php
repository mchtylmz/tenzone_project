<x-panel-layout>
    <x-slot name="title">{{ __('Child Programme') }}</x-slot>

    <div class="tm-page-head">
        <h1 class="title">{{ $child->fullname }} Programme</h1>
        <p class="text mb-0">You can see your scheduled programs here.</p>
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

    <div class="row">

        <div class="tm-calendar tm-calendar2">
            <div class="row g-0">

                <div class="col-lg-2">
                    <div class="nav-scroll">
                        <div class="nav flex-column nav-pills week_section" id="calendar" role="tablist" aria-orientation="vertical">
                            @foreach($weeks as $week)
                                <button class="nav-link {{$loop->index == 0 ? 'active':''}}" id="id-week{{$week->id}}" data-bs-toggle="pill" data-bs-target="#week{{$week->id}}" type="button" role="tab" aria-controls="week{{$week->id}}" aria-selected="true">
                                    <h4 class="title">{{ $week->title }}</h4>
                                    <span class="date">
                                        {{ date('d', strtotime($week->start_date)) }} -
                                        {{ date('d M', strtotime($week->end_date)) }}
                                    </span>
                                </button>
                            @endforeach
                        </div>
                    </div>
                    <a href="#modalAddWeek" class="btn btn-primary w-100 my-3" data-bs-target="#modalAddWeek" data-bs-toggle="modal">
                        Add Week
                    </a>
                </div>

                <div class="col-lg-10">
                    <div class="tab-content bg-white" id="calendarContent">
                        @foreach($weeks as $week)
                            <div class="tab-pane fade {{$loop->index == 0 ? 'show active':''}}"
                                 id="week{{$week->id}}" role="tabpanel">

                                @foreach($week->activities()->get() as $activite)
                                    <div class="tm-calendar-item flex-between items-center">
                                        <div class="left flex-start items-center">
                                            <div class="text text-main">
                                                {{ $activite->teacher()->first()->fullname }}
                                            </div>
                                            <div class="text">{{ $activite->title }}</div>
                                            <div class="text">{{ $activite->type }}</div>
                                        </div>
                                        <div class="right flex-end items-center">
                                            @if($activite->download)
                                                <a target="_blank" href="{!! asset($activite->download) !!}"
                                                   class="btn">
                                                    <i class="ri-download-cloud-line"></i> Download
                                                </a>
                                            @endif
                                            @if($activite->watch)
                                                <a target="_blank" href="{!! asset($activite->watch) !!}" class="btn">
                                                    <i class="ri-play-circle-line"></i> Watch
                                                </a>
                                            @endif
                                            @if($submission = $activite->submission()->first())
                                                <a target="_blank" href="{!! asset($submission->file) !!}" class="btn">
                                                    <i class="ri-download-cloud-line"></i>
                                                    View Submission
                                                </a>
                                            @endif
                                            @if($activite->teacher_id == auth()->user()->id)
                                                <form onsubmit="return confirm('{{ __('Activite is delete ?') }}')" action="{{ route('therapy.delete.activite', $activite->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn">
                                                        <i class="ri-delete-bin-4-line me-0"></i>
                                                    </button>
                                                </form>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach

                                <a href="#modalAddActivity{{$week->id}}" data-bs-target="#modalAddActivity{{$week->id}}" data-bs-toggle="modal"
                                   class="btn btn-block btn-primary mt-3">
                                    Add Week Activity
                                </a>
                                <x-add_activity week="{{$week->id}}" weekTitle="{{$week->title}}" prefix="therapy"/>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>

    </div>

    <x-add_week child="{{$child->id}}" prefix="therapy" />
</x-panel-layout>
