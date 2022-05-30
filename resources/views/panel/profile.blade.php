<x-panel-layout>
    <x-slot name="title">{{ __('User Pofile') }}</x-slot>

    <div class="row">
        <div class="col-lg-4">
            <div class="tm-profile-card tm-profile-left">
                <div class="content mb-4">
                    <div class="img">
                        <img src="{{ asset('images/profile2.png') }}" alt="profile">
                        <div class="online"></div>
                    </div>
                    <h5>{{ auth()->user()->name }} {{ auth()->user()->surname }}</h5>
                    @role('user')
                    <p class="fs-14 text-muted mb-0">Parent: {{ parent()->name }} {{ parent()->surname }}</p>
                    @endrole
                </div>
            </div>

            @role('parent')
            @if(childs())
            <div class="tm-profile-card py-3 mb-20px">
                @foreach(childs() as $child)
                    <a href="{{ route('user.profile', $child->email) }}" class="tm-profile-btn student">
                        <img src="{{ asset('images/profile.png') }}" alt="profile">
                        {{ $child->fullname }}
                    </a>
                @endforeach
            </div>
            @endif
            <a href="{{ route('parent.child.add') }}" class="btn btn-primary btn-block mb-20px">Add a child account</a>
            @endrole

        </div>

        <div class="col-lg-8">
            <div class="tm-profile-card tm-profile-content">
                @if (session('message'))
                    <div class="alert alert-info">{{ session('message') }}</div>
                @endif
                <h4 class="bg-light p-2 mb-3">
                    {{ __('role.' . auth()->user()->getRoleNames()[0]) }}
                </h4>
                <form action="{{ route('my.profile') }}" method="post">
                    @csrf

                    <div class="mb-3">
                        <label>Name</label>
                        <div class="tm-input">
                            <div class="icon"><i class="ri-user-line"></i></div>
                            <input type="text" name="name" value="{{ user()->name }}" class="form-control" placeholder="Name">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label>Surname</label>
                        <div class="tm-input">
                            <div class="icon"><i class="ri-user-line"></i></div>
                            <input type="text" name="surname" value="{{ user()->surname }}" class="form-control" placeholder="Surname">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label>Date of birth <span class="text-main">*</span></label>
                        <div class="tm-input">
                            <div class="icon"><i class="ri-calendar-2-fill"></i></div>
                            <input type="text" class="form-control datepicker" name="dob" value="{{ user()->dob }}" placeholder="Date of birth">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label>Gender <span class="text-main">*</span></label>
                        <div class="btn-group tm-btn-group w-190" role="group" aria-label="Basic radio toggle button group">

                            <input type="radio" class="btn-check" name="gender" id="btnradio1" value="male" autocomplete="off" {{ user()->gender == 'male' ? 'checked':'' }}>
                            <label class="tm-checkbtn btn btn-light btn-48" for="btnradio1">Male</label>

                            <input type="radio" class="btn-check" name="gender" id="btnradio2" value="female" autocomplete="off" {{ user()->gender == 'female' ? 'checked':'' }}>
                            <label class="tm-checkbtn btn btn-light btn-48" for="btnradio2">Female</label>

                            <input type="radio" class="btn-check" name="gender" id="btnradio3" value="unknown" autocomplete="off" {{ user()->gender != 'male' && user()->gender != 'female' ? 'checked':'' }}>
                            <label class="tm-checkbtn btn btn-light btn-48" for="btnradio3">Unknown</label>

                        </div>
                    </div>

                    <div class="mb-3">
                        <label>Email Address <span class="text-main">*</span></label>
                        <div class="tm-input">
                            <div class="icon"><i class="ri-mail-open-line"></i></div>
                            <input type="text" class="form-control" placeholder="Email address" name="email" value="{{ user()->email }}" >
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary btn-block btn-icon-hover">Save <i class="fa fa-arrow-right"></i></button>

                </form>
            </div>
        </div>

    </div>

</x-panel-layout>
