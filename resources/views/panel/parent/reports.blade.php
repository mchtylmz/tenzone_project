<x-panel-layout>
    <x-slot name="title">{{ __('Parent Reports') }}</x-slot>

    <div class="tm-page-head">
        <h1 class="title">Reports</h1>
        <p class="text mb-0">You can see your scheduled parents here.</p>
    </div>

    <div class="row">

        @foreach($childs as $child)
            <div class="col-md-6 col-xl-4">
                <div class="tm-teacher-item tm-card">
                    <div class="img">
                        <img src="{!! asset($child->image) !!}" alt="profile">
                        <div class="circle">
                            <img src="{!! asset($child->image) !!}" alt="profile">
                        </div>
                    </div>
                    <h5 class="title">{{ $child->fullname }}</h5>
                    <a href="{{ route('parent.child_report', $child->id) }}" class="btn btn-block btn-light">
                        {{ __('Child Report') }}
                    </a>
                </div>
            </div>
        @endforeach

    </div>
</x-panel-layout>
