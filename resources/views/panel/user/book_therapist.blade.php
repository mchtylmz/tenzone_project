<x-panel-layout>
    <x-slot name="title">{{ __('Book Teacher') }}</x-slot>

    <div class="tm-page-head">
        <h1 class="title">Book Therapist</h1>
        <p class="text mb-0">You can see your scheduled booking here.</p>
    </div>

    <div class="row">

        @foreach($therapist as $user)
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
                        <h2 class="price mb-0 text-main">$14</h2>
                    </div>
                    <div class="content mb-4">
                        <h6 class="mb-3">Qualifications</h6>
                        <ul>
                            <li>Lorem ipsum dolor</li>
                            <li>Lorem ipsum dolor</li>
                            <li>Lorem ipsum dolor</li>
                            <li>Lorem ipsum dolor</li>
                        </ul>
                    </div>
                    <a href="{{ route('user.book.therapy', $user->id) }}" class="btn btn-block btn-primary">
                        Book
                    </a>
                </div>
            </div>
        @endforeach

    </div>

    {{ $therapist->links() }}

</x-panel-layout>
