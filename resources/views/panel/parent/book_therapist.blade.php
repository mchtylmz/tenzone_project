<x-panel-layout>
    <x-slot name="title">{{ __('Book Teacher') }}</x-slot>

    <div class="tm-page-head">
        <h1 class="title">Book Therapist</h1>
        <p class="text mb-0">You can see your scheduled booking here.</p>
    </div>

    <div class="row">

        @foreach($therapist_services as $service)
            @if($user = $service->user()->first())
                <div class="col-md-6 col-xl-6">
                    <div class="tm-pick-item tm-card">
                        <div class="head flex-between items-center">

                            <div class="teacher flex-start items-center">
                                <img src="{!! asset($user->image) !!}" alt="profile">
                                <div class="info">
                                    <h5 class="fs-18 mb-1">{{ $user->fullname }}</h5>
                                    <span class="d-block">{{ $service->name }}</span>
                                </div>
                            </div>
                            <h2 class="price mb-0 text-main">£{{$service->price}}</h2>
                        </div>
                        <div class="content mb-4">
                            <h6 class="mb-3">{{ __('Qualifications') }}</h6>
                            <div>
                                {!! $service->description !!}
                            </div>
                        </div>
                        <a href="{{ route('parent.book.therapy', [$service->id, $user->id]) }}" class="btn btn-block btn-primary">
                            Book
                        </a>
                    </div>
                </div>

            @endif
        @endforeach

    </div>

    {{ $therapist_services->links() }}

</x-panel-layout>
