<x-panel-layout>
    <x-slot name="title">{{ __('Add User') }}</x-slot>

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
            {{ __('User Add') }}
        </h5>
        <form action="{{ route('admin.user.store') }}" method="post" class="loading">
            @csrf

            <div class="mb-3">
                <label>Name</label>
                <div class="tm-input">
                    <div class="icon"><i class="ri-user-line"></i></div>
                    <input type="text" name="name" required class="form-control" value="{{ old('name') }}" placeholder="Name">
                </div>
            </div>

            <div class="mb-3">
                <label>Surname</label>
                <div class="tm-input">
                    <div class="icon"><i class="ri-user-line"></i></div>
                    <input type="text" name="surname" value="{{ old('surname') }}" required class="form-control" placeholder="Surname">
                </div>
            </div>

            <div class="mb-3">
                <label>Password</label>
                <div class="tm-input">
                    <div class="icon"><i class="ri-user-line"></i></div>
                    <input type="password" name="password" required class="form-control" placeholder="******">
                </div>
            </div>

            <div class="mb-3">
                <label>Date of birth <span class="text-main">*</span></label>
                <div class="tm-input">
                    <div class="icon"><i class="ri-calendar-2-fill"></i></div>
                    <input type="text" class="form-control datepicker" value="{{ old('dob') }}" name="dob" required placeholder="Date of birth">
                </div>
            </div>

            <div class="mb-3">
                <label>Gender <span class="text-main">*</span></label>
                <div class="btn-group tm-btn-group w-190" role="group" aria-label="Basic radio toggle button group">

                    <input type="radio" class="btn-check" name="gender" id="btnradio1" value="male" autocomplete="off" {{ old('gender') == 'male' ? 'checked':'' }} required>
                    <label class="tm-checkbtn btn btn-light btn-48" for="btnradio1">Male</label>

                    <input type="radio" class="btn-check" name="gender" id="btnradio2" value="female" autocomplete="off" {{ old('gender') == 'female' ? 'checked':'' }} required>
                    <label class="tm-checkbtn btn btn-light btn-48" for="btnradio2">Female</label>

                </div>
            </div>

            <div class="mb-3">
                <label>Email Address <span class="text-main">*</span></label>
                <div class="tm-input">
                    <div class="icon"><i class="ri-mail-open-line"></i></div>
                    <input type="text" class="form-control" value="{{ old('email') }}" placeholder="Email address" name="email" required >
                </div>
            </div>

            <div class="mb-3">
                <label>Parents</label>
                <select name="parent_id" class="form-select" required>
                    <option value="0">Nothing</option>
                    @foreach($parents as $parent)
                        <option value="{{$parent->id}}">{{ $parent->fullname }} ({{ $parent->email }})</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label>Role</label>
                <select name="role" class="form-select" required>
                    <option selected disabled>Select role</option>
                    @foreach($roles as $role)
                        <option value="{{$role->name}}">{{ __('role.' . $role->name) }}</option>
                    @endforeach
                </select>
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
