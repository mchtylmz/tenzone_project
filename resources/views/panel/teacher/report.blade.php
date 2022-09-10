<x-panel-layout>
    <x-slot name="title">{{ __($child->fullname . ' Report') }}</x-slot>

    <div class="tm-page-head">
        <h1 class="title">{{ $child->fullname }} Report</h1>
        <p class="text mb-0">You can see your scheduled programs here.</p>
    </div>


    <div class="flex-between items-center flex-block-mobile mb-4">
        <a href="#modalAddReport" data-bs-target="#modalAddReport" data-bs-toggle="modal" class="btn btn-primary fw-medium br-4 px-4">Add Report</a>
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

        @foreach($reports as $report)
            <div class="col-md-6 col-lg-6 col-xl-4">
                <div class="tm-card report">
                    <h4 class="title fs-24">{{ $report->title }}</h4>
                    @if($report->watch)
                        <div class="video">
                            <img src="{{ asset('images/report.png') }}" alt="report" class="img">
                            <a href="#modalVideo{{ $report->id }}" data-bs-toggle="modal"
                               data-bs-target="#modalVideo{{ $report->id }}" class="button"><i
                                    class="ri-play-circle-line"></i></a>
                        </div>
                    @else
                        <img src="{{ asset('images/report.png') }}" alt="report" class="img">
                    @endif
                    <div class="content">
                        <p class="contenttitle fs-18 mb-3">{{ $report->description }}</p>
                        <div class="flex-start tm-card-infos mb-4">
                            @if($teacher = $report->teacher()->first())
                                <span><i class="ri-user-line text-main"></i> {{ $teacher->fullname }}</span>
                            @endif
                            <span>
                                <i class="ri-calendar-2-fill text-danger"></i> {{ date('d.m.Y', strtotime($report->created_at)) }}
                            </span>
                        </div>
                        @if($report->download)
                            <a target="_blank" href="{!! asset($report->download) !!}" class="btn btn-opacity-primary btn-block fw-medium"><i class="ri-download-cloud-line text-main"></i> Download</a>
                        @endif
                        @if($report->watch)
                            <a ref="#modalVideo{{ $report->id }}" data-bs-toggle="modal"
                               data-bs-target="#modalVideo{{ $report->id }}" class="btn btn-opacity-primary btn-block fw-medium"><i class="ri-play-circle-line"></i> Watch</a>

                            <x-modal_video id="{{ $report->id }}"
                                           title="{{ $report->title }}"
                                           teacher="{{ $teacher->fullname ?? ' - ' }}"
                                           date="{{ date('d.m.Y', strtotime($report->created_at)) }}"
                                           watch="{{ $report->watch  }}" />
                        @endif
                    </div>
                </div>
            </div>
        @endforeach

    </div>

    <x-add_report child="{{$child->id}}" fullname="{{$child->fullname}}" />

</x-panel-layout>
