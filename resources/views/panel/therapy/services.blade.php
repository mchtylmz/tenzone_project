<x-panel-layout>
    <x-slot name="title">{{ __('Therapy Services Admin') }}</x-slot>

    <div class="tm-page-head">
        <h1 class="title">Therapist Services</h1>
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
                    <i class="ri-add-box-fill"></i> Add Service
                </a>
            </div>
        </div>

        <div class="col-lg-12 collapse" id="collapseAdd">
            <div class="tm-time-item mb-4">
                <form action="{{ route('therapy.service.add') }}" method="post" class="loading">
                    @csrf
                    <div class="mb-3">
                        <label>{{ __('Service') }}</label>
                        <select name="service_id" class="form-control" required>
                            @foreach($services as $service)
                                <option value="{{ $service->id }}">{{ $service->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label>{{ __('Service Description') }}</label>
                        <textarea rows="4" name="description" class="form-control" autocomplete="off"
                                  placeholder="{{ __('Description') }}" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label>{{ __('Service Price') }}</label>
                        <input type="number" step="0.001" name="price" class="form-control" autocomplete="off"
                               placeholder="{{ __('Price') }}" required />
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Add</button>
                </form>
            </div>
        </div>
    </dic>

    @if(count($therapist_services) == 0)
        <div class="tm-card tm-card-blank text-center">
            <div class="icon"><i class="ri-user-2-fill"></i></div>
            <h4>You do not have therapist services</h4>
            <p class="text-5e fs-14">Lorem Ipsum is simply printing and typesetting industry. </p>
        </div>
    @endif

    @foreach($therapist_services as $tservice)
        <div class="tm-time-item flex-between items-center flex-block-mobile">
            <div class="left">
                <div class="text">
                    <i class="ri-global-line text-main"></i> {{ $tservice->service->name }}
                </div>
            </div>
            <div class="mid">
                <div class="text">
                    <i class="ri-price-tag-3-line text-main"></i> £{{ $tservice->price }}
                </div>
            </div>
            <div class="right flex-end">
                <a class="btn btn-warning fw-medium br-4 me-2" data-bs-toggle="collapse"
                   href="#collapseEdit{{$tservice->id}}" role="button" aria-expanded="false"
                   aria-controls="collapseEdit{{$tservice->id}}">Edit</a>
                <form action="{{ route('therapy.service.delete', $tservice->id) }}" method="post" onsubmit="return confirm('The service ({{  $tservice->service->name }}) will be removed from your service list, continue the process?');" class="loading">
                    @csrf
                    <button class="btn btn-danger fw-medium br-4 me-2" type="submit">Delete</button>
                </form>
            </div>
        </div>

        <div class="collapse" id="collapseEdit{{$tservice->id}}">
            <div class="tm-time-item mb-5 mt-0">
                <form action="{{ route('therapy.service.update', $tservice->id) }}" method="post" class="loading">
                    @csrf
                    <div class="mb-3">
                        <label>{{ __('Service Description') }}</label>
                        <textarea rows="4" name="description" class="form-control" autocomplete="off"
                                  placeholder="{{ __('Description') }}" required>{{ $tservice->description }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label>{{ __('Service Price') }}</label>
                        <input type="number" step="0.001" name="price" class="form-control" autocomplete="off"
                               placeholder="{{ __('Price') }}" value="{{ $tservice->price }}" required />
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Update</button>
                </form>
            </div>
        </div>
    @endforeach

    {{ $therapist_services->links() }}

    <x-modal_help_add/>
</x-panel-layout>
