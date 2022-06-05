<x-panel-layout>
    <x-slot name="title">{{ __('Book Teacher') }}</x-slot>

    <div class="tm-page-head">
        <h1 class="title">Book Teacher</h1>
        <p class="text mb-0">You can see your scheduled booking here.</p>
    </div>

    <div class="row">

        @foreach($teachers as $teacher)
            <div class="col-md-6 col-xl-4">
                <div class="tm-teacher-item tm-card">
                    <div class="img"><img src="{!! asset($teacher->image) !!}" alt="profile"></div>
                    <h5 class="title">{{ $teacher->fullname }}</h5>
                    <p>Arrange a video call with your teacher</p>
                    @if(credit() >= 1)
                        <a href="{{ route('user.book.teacher', $teacher->id) }}" class="btn btn-block btn-primary">
                            Book (1 Credit)
                        </a>
                    @endif
                    <a href="{{ route('buy.credit') }}" class="btn btn-block btn-light">Buy Credit</a>
                </div>
            </div>
        @endforeach

    </div>

    {{ $teachers->links() }}

</x-panel-layout>
