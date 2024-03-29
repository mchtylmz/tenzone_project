<x-panel-layout>
    <x-slot name="title">{{ __('Edit User') }} - {{ $user->name }} {{ $user->surname }}</x-slot>

    <div class="tm-profile-card tm-profile-content mb-5">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <h5 class="bg-light p-3 mb-3">
            {{ __('User Edit') }} - {{ $user->name }} {{ $user->surname }}
        </h5>
        <form action="{{ route('admin.user.edit', $user->id) }}" method="post" class="loading">
            @csrf

            <div class="mb-3">
                <label>Name</label>
                <div class="tm-input">
                    <div class="icon"><i class="ri-user-line"></i></div>
                    <input type="text" name="name" required class="form-control" value="{{ $user->name }}" placeholder="Name">
                </div>
            </div>

            <div class="mb-3">
                <label>Surname</label>
                <div class="tm-input">
                    <div class="icon"><i class="ri-user-line"></i></div>
                    <input type="text" name="surname" value="{{ $user->surname }}" required class="form-control" placeholder="Surname">
                </div>
            </div>

            <div class="mb-3">
                <label>Password</label>
                <div class="tm-input">
                    <div class="icon"><i class="ri-user-line"></i></div>
                    <input type="text" name="password" autocomplete="off" class="form-control" placeholder="******">
                </div>
            </div>

            <div class="mb-3">
                <label>Date of birth <span class="text-main">*</span></label>
                <div class="tm-input">
                    <div class="icon"><i class="ri-calendar-2-fill"></i></div>
                    <input type="text" class="form-control datepicker" value="{{ $user->dob }}" name="dob" required placeholder="Date of birth">
                </div>
            </div>

            <div class="mb-3">
                <label>Gender <span class="text-main">*</span></label>
                <div class="btn-group tm-btn-group w-190" role="group" aria-label="Basic radio toggle button group">

                    <input type="radio" class="btn-check" name="gender" id="btnradio1" value="male" autocomplete="off" {{ $user->gender == 'male' ? 'checked':'' }} required>
                    <label class="tm-checkbtn btn btn-light btn-48" for="btnradio1">Male</label>

                    <input type="radio" class="btn-check" name="gender" id="btnradio2" value="female" autocomplete="off" {{ $user->gender == 'female' ? 'checked':'' }} required>
                    <label class="tm-checkbtn btn btn-light btn-48" for="btnradio2">Female</label>

                </div>
            </div>

            <div class="mb-3">
                <label>Email Address <span class="text-main">*</span></label>
                <div class="tm-input">
                    <div class="icon"><i class="ri-mail-open-line"></i></div>
                    <input type="text" class="form-control" value="{{ $user->email }}" autocomplete="off" placeholder="Email address" name="email" required >
                </div>
            </div>

            @if($user->hasRole('user'))
                <div class="mb-3">
                    <label>Parents</label>
                    <select name="parent_id" class="form-select" required>
                        <option value="0">Nothing</option>
                        @foreach($parents as $parent)
                            <option value="{{$parent->id}}" {{ $user->parent_id == $parent->id ? 'selected':'' }}>{{ $parent->fullname }} ({{ $parent->email }})</option>
                        @endforeach
                    </select>
                </div>
            @endif

            <div class="mb-3">
                <label>Role</label>
                <select name="role" class="form-select" required>
                    <option selected disabled>Select role</option>
                    @foreach($roles as $role)
                        <option value="{{$role->name}}" {{ in_array($role->name, $user->getRoleNames()->toArray()) ? 'selected':'' }}>{{ __('role.' . $role->name) }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label>Status</label>
                <select name="status" class="form-select" required>
                    <option value="active" {{ $user->status == 'active' ? 'selected':'' }}>{{ __('Active') }}</option>
                    <option value="passive" {{ $user->status == 'passive' ? 'selected':'' }}>{{ __('Passive') }}</option>
                </select>
            </div>

            <div class="mb-3">
                <label>Subscription Status</label>
                <select name="plan_status" class="form-select" required>
                    <option value="yes" {{ $user->password == 'yes' ? 'selected':'' }}>{{ __('Yes, Active') }}</option>
                    <option value="no" {{ $user->password == 'no' ? 'selected':'' }}>{{ __('No, Passive') }}</option>
                </select>
            </div>

            <div class="mb-3">
                <label>Plan Credit</label>
                <div class="tm-input">
                    <div class="icon"><i class="ri-refund-2-line"></i></div>
                    <input type="number" class="form-control" value="{{ $user->plan_credit }}" placeholder="Plan Credit" name="plan_credit" required >
                </div>
            </div>

            <button type="submit" class="btn btn-primary btn-block btn-icon-hover mt-3">
                Save <i class="fa fa-arrow-right"></i>
            </button>

        </form>
    </div>

    <br>
    <br>
    <br>
</x-panel-layout>
