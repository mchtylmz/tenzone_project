<x-panel-layout>
    <x-slot name="title">{{ __('Helps Admin') }}</x-slot>

    <div class="tm-page-head">
        <h1 class="title">Helps</h1>
        <p class="text mb-0">You can see your scheduled programs here.</p>
    </div>

    <dic class="row justify-content-between">
        <div class="col-lg-7">
            <div class="mb-4">
                <a href="#modalHelpAdd" data-bs-toggle="modal" data-bs-target="#modalHelpAdd" class="btn btn-primary with-icon px-4 br-4">
                    <i class="ri-add-box-fill"></i> Add Help Question
                </a>
            </div>
        </div>
        <div class="col-lg-5 text-right">
            <form class="row justify-content-between g-3" method="get">
                <div class="col">
                    <label for="search" class="visually-hidden">Search</label>
                    <input type="text" name="q" class="form-control bg-white" id="search" autocomplete="off" placeholder="Search..."  value="{{ request('q') }}">
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-primary mt-1">Search</button>
                </div>
            </form>
        </div>
    </dic>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @foreach($helps as $help)
        <div class="tm-time-item flex-between items-center flex-block-mobile">
            <div class="left">
                <div class="text">
                    <i class="ri-global-line text-main"></i> {{ $help->category }}
                </div>
                <div class="text">
                    <i class="ri-question-line text-main"></i>  {{ $help->title }}
                </div>
            </div>
            <div class="right flex-end">
                <a href="#modalHelpEdit{{$help->id}}" class="btn btn-warning fw-medium br-4" data-bs-toggle="modal" data-bs-target="#modalHelpEdit{{$help->id}}">Edit</a>
                <a href="#modalHelpDelete{{$help->id}}" class="btn btn-danger fw-medium br-4" data-bs-toggle="modal" data-bs-target="#modalHelpDelete{{$help->id}}">Delete</a>
            </div>
        </div>

        <x-modal_help_edit id="{{$help->id}}" title="{{$help->title}}" content="{{$help->content}}" category="{{$help->category}}"/>
        <x-modal_help_cancel id="{{$help->id}}" />
    @endforeach

    {{ $helps->links() }}

    <x-modal_help_add />
</x-panel-layout>
