<x-panel-layout>
    <x-slot name="title">{{ __('Therapy Servies') }}</x-slot>

    <div class="tm-page-head">
        <h1 class="title">Therapy Servies</h1>
        <p class="text mb-0">You can see your scheduled booking here.</p>
    </div>

    <div class="row">

        @foreach($services as $service)
            <div class="col-md-6 col-xl-4">
                <div class="tm-teacher-item tm-card">
                    <h5 class="title">{{ $service->name }}</h5>
                    <p>{{ $service->description }}</p>
                    <a href="{{ route('user.book.therapist', $service->id) }}" class="btn btn-block btn-primary">
                        Service Therapist
                    </a>
                </div>
            </div>
        @endforeach

    </div>

    {{ $services->links() }}

</x-panel-layout>
