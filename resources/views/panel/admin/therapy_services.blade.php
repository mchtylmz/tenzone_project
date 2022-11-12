<x-panel-layout>
    <x-slot name="title">{{ __('Therapy Services Admin') }}</x-slot>

    <div class="tm-page-head">
        <h1 class="title">Therapy Services</h1>
        <p class="text mb-0">You can see your scheduled programs here.</p>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <dic class="row justify-content-between">
        <div class="col-lg-7">
            <div class="mb-4">
                <a data-bs-toggle="collapse" href="#collapseAdd" role="button" aria-expanded="false"
                   aria-controls="collapseAdd" class="btn btn-primary with-icon px-4 br-4">
                    <i class="ri-add-box-fill"></i> Add Therapy Service
                </a>
            </div>
        </div>
        <div class="col-lg-5 text-right">
            <form class="row justify-content-between g-3" method="get">
                <div class="col">
                    <label for="search" class="visually-hidden">Search</label>
                    <input type="text" name="q" class="form-control bg-white" id="search" autocomplete="off"
                           placeholder="Search..." value="{{ request('q') }}">
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-primary mt-1">Search</button>
                </div>
            </form>
        </div>

        <div class="col-lg-12 collapse" id="collapseAdd">
            <div class="tm-time-item mb-4">
                <form action="{{ route('admin.therapy.add') }}" method="post" class="loading">
                    @csrf
                    <div class="mb-3">
                        <label>{{ __('Service Category') }}</label>
                        <input type="text" name="category" class="form-control" autocomplete="off"
                               placeholder="{{ __('Category') }}" value="" required>
                    </div>
                    <div class="mb-3">
                        <label>{{ __('Service Name') }}</label>
                        <textarea rows="2" name="name" class="form-control" autocomplete="off"
                                  placeholder="{{ __('Name') }}" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label>{{ __('Service Description') }}</label>
                        <textarea rows="4" name="description" class="form-control" autocomplete="off"
                                  placeholder="{{ __('Description') }}" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Add</button>
                </form>
            </div>
        </div>
    </dic>

    @foreach($services as $service)
        <div class="tm-time-item flex-between items-center flex-block-mobile">
            <div class="left">
                <div class="text">
                    <i class="ri-global-line text-main"></i> {{ $service->category }}
                </div>
                <div class="text">
                    <i class="ri-question-line text-main"></i> {{ $service->name }}
                </div>
            </div>
            <div class="right flex-end">
                <a class="btn btn-success fw-medium br-4 me-2" data-bs-toggle="collapse"
                   href="#collapseTherapist{{$service->id}}" role="button" aria-expanded="false"
                   aria-controls="collapseTherapist{{$service->id}}">Therapist</a>
                <a class="btn btn-warning fw-medium br-4 me-2" data-bs-toggle="collapse"
                   href="#collapseEdit{{$service->id}}" role="button" aria-expanded="false"
                   aria-controls="collapseEdit{{$service->id}}">Edit</a>
                <a href="#modalTherapyDelete{{$service->id}}" class="btn btn-danger fw-medium br-4"
                   data-bs-toggle="modal" data-bs-target="#modalTherapyDelete{{$service->id}}">Delete</a>
            </div>
        </div>

        <div class="collapse" id="collapseEdit{{$service->id}}">
            <div class="tm-time-item mb-5 mt-0">
                <form action="{{ route('admin.therapy.save') }}" method="post" class="loading">
                    @csrf
                    <input type="hidden" name="id" value="{{$service->id}}"/>
                    <div class="mb-3">
                        <label>{{ __('Service Category') }}</label>
                        <input type="text" name="category" class="form-control" autocomplete="off"
                               placeholder="{{ __('Category') }}" value="{{$service->category}}" required>
                    </div>
                    <div class="mb-3">
                        <label>{{ __('Service Name') }}</label>
                        <textarea rows="2" name="name" class="form-control" autocomplete="off"
                                  placeholder="{{ __('Name') }}" required>{{$service->name}}</textarea>
                    </div>
                    <div class="mb-3">
                        <label>{{ __('Service Description') }}</label>
                        <textarea rows="4" name="description" class="form-control" autocomplete="off"
                                  placeholder="{{ __('Description') }}" required>{{$service->description}}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Update</button>
                </form>
            </div>
        </div>

        <div class="collapse" id="collapseTherapist{{$service->id}}">
            <div class="tm-pick-item tm-card">
                <div class="row">
                    @foreach($service->therapist()->get() as $therapsit)
                        @if($user = $therapsit->user()->first())
                            <div class="col-md-4 col-xl-4 border p-3">

                                <div class="head flex-between items-center mb-1 pb-1 border-none border-0">
                                    <div class="teacher flex-start items-center">
                                        <img src="{!! asset($user->image) !!}" alt="profile">
                                        <div class="info">
                                            <h5 class="fs-18 mb-1">{{ $user->fullname }}</h5>
                                            <span class="d-block">{{ $service->name }}</span>
                                        </div>
                                    </div>
                                    <h2 class="price mb-0 text-main">£{{$therapsit->price}}</h2>
                                </div>
                            </div>

                        @endif
                    @endforeach
                </div>
            </div>
        </div>
        <x-modal_therapy_delete id="{{$service->id}}"/>
    @endforeach

    {{ $services->links() }}

    <x-modal_help_add/>
</x-panel-layout>
