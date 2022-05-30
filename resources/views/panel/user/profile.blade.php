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
                    <h5>{{ $user->fullname }}</h5>
                    @if($user->hasAnyRole('user'))
                    <p class="fs-14 text-muted mb-0">Parent: {{ $parent->fullname }}</p>
                    @endrole
                </div>
                <ul class="links list-unstyled mb-0">
                    <li>
                        <a href="{{ route('my.profile') }}" class="tm-profile-btn">
                            <div class="icon"><i class="ri-user-line"></i></div> My Account
                        </a>
                    </li>
                </ul>
            </div>

        </div>

        <div class="col-lg-8">
            <div class="tm-profile-card tm-profile-content">
                <h4 class="bg-light p-2 mb-3">
                    {{ __('role.' . $user->getRoleNames()[0]) }}
                </h4>
                <form action="{{ route('user.profile', $user->email) }}" method="post">
                    @csrf

                    <div class="mb-3">
                        <label>Name</label>
                        <div class="tm-input">
                            <div class="icon"><i class="ri-user-line"></i></div>
                            <input type="text" name="name" value="{{ $user->name }}" class="form-control" placeholder="Name">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label>Surname</label>
                        <div class="tm-input">
                            <div class="icon"><i class="ri-user-line"></i></div>
                            <input type="text" name="surname" value="{{ $user->surname }}" class="form-control" placeholder="Surname">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label>Date of birth <span class="text-main">*</span></label>
                        <div class="tm-input">
                            <div class="icon"><i class="ri-calendar-2-fill"></i></div>
                            <input type="text" class="form-control datepicker" name="dob" value="{{ $user->dob }}" placeholder="Date of birth">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label>Gender <span class="text-main">*</span></label>
                        <div class="btn-group tm-btn-group w-190" role="group" aria-label="Basic radio toggle button group">

                            <input type="radio" class="btn-check" name="gender" id="btnradio1" value="male" autocomplete="off" {{ $user->gender == 'male' ? 'checked':'' }}>
                            <label class="tm-checkbtn btn btn-light btn-48" for="btnradio1">Male</label>

                            <input type="radio" class="btn-check" name="gender" id="btnradio2" value="female" autocomplete="off" {{ $user->gender == 'female' ? 'checked':'' }}>
                            <label class="tm-checkbtn btn btn-light btn-48" for="btnradio2">Female</label>

                            <input type="radio" class="btn-check" name="gender" id="btnradio3" value="unknown" autocomplete="off" {{ $user->gender != 'male' && $user->gender != 'female' ? 'checked':'' }}>
                            <label class="tm-checkbtn btn btn-light btn-48" for="btnradio3">Unknown</label>

                        </div>
                    </div>

                    <div class="mb-3">
                        <label>Email Address <span class="text-main">*</span></label>
                        <div class="tm-input">
                            <div class="icon"><i class="ri-mail-open-line"></i></div>
                            <input type="text" class="form-control" placeholder="Email address" name="email" value="{{ $user->email }}" >
                        </div>
                    </div>

                    @if(user()->id == $user->parent_id)
                        <button type="submit" class="btn btn-primary btn-block btn-icon-hover">Save <i class="fa fa-arrow-right"></i></button>
                    @endif

                </form>
            </div>
        </div>

    </div>

</x-panel-layout>
