<x-panel-layout>
    <x-slot name="title">{{ __('Admin Home') }}</x-slot>

    <div class="tm-page-head">
        <h1 class="title">Users</h1>
    </div>

    <div class="flex-between items-center flex-block-mobile mb-4">
        <ul class="tm-nav-head nav nav-pills">
            <li class="nav-item">
                <a class="nav-link {{ $filter_role == 'user' ? 'active' : '' }}" href="?role=user">Childs</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ $filter_role == 'parent' ? 'active' : '' }}" href="?role=parent">Parents</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ $filter_role == 'teacher' ? 'active' : '' }}" href="?role=teacher">Teachers</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ $filter_role == 'therapy' ? 'active' : '' }}" href="?role=therapy">Therapist</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ $filter_role == 'admin' ? 'active' : '' }}" href="?role=admin">Admins</a>
            </li>
        </ul>
        <div class="mb-4">
            <a href="{{ route('admin.user.add') }}" class="btn btn-primary with-icon px-4 br-4">
                <i class="ri-user-add-line"></i> Add User
            </a>
        </div>
    </div>


    @foreach($users as $user)

        <div class="tm-time-item flex-between items-center flex-block-mobile">
            <div class="left flex-start">
                <div class="text">
                    <i class="ri-user-line"></i>
                    <div class="d-block">
                        <p class="mb-1">{{ $user->fullname }}</p>
                        <p class="mb-1">{{ $user->email }}</p>
                    </div>
                </div>
            </div>
            @if($parent = $user->parent()->first())
                <div class="left2">
                    <div class="text">
                        <i class="ri-user-line"></i>
                        <div class="d-block">
                            <p class="mb-1">Parent: {{ $parent->fullname }}</p>
                            <p class="mb-1">{{ $parent->email }}</p>
                        </div>
                    </div>
                </div>
            @endif
            @if(($parent && $plan = $parent->plan()) || ($user->hasrole('parent') && $plan = $user->plan()))
                <div class="left2">
                    <div class="text">
                        <i class="ri-shield-user-line"></i>
                        {{ $plan->name }}
                    </div>
                </div>
            @elseif($user->hasrole('user') || $user->hasrole('parent'))
                <div class="left2">
                    <div class="text" style="color: red; font-weight: bold">
                        <i class="ri-shield-user-line"></i>
                        Plan -
                    </div>
                </div>
            @endif
            @if($user->hasrole('parent'))
                <div class="mid">
                    <div class="text">
                        <i class="ri-user-4-line"></i>
                        {{ $user->childs()->count() }} {{ $user->childs()->count() > 1 ? 'Children':'Child'}}
                    </div>
                </div>
            @endif
            <div class="mid">
                <div class="text"  style="{{ $user->status == 'passive' ? 'color: red; font-weight: bold': 'color: darkgreen' }}">
                    <i class="ri-bubble-chart-fill"></i> {{ $user->status == 'passive' ? __('Passive'): __('Active') }}
                </div>
            </div>
            <div class="right flex-end">
                <div class="text">
                    <i class="ri-calendar-2-line"></i>{{ date('d M Y', strtotime($user->created_at)) }}
                </div>
            </div>
            <div class="right flex-end">
                <a class="btn btn-warning fw-medium br-4" href="{{ route('admin.user.edit', $user->id) }}">
                    Edit
                </a>
                @if(!$user->hasRole('admin'))
                    <form action="{{ route('admin.user.delete', $user->id) }}" onsubmit="return confirm('{{ __('The user will be deleted, are you sure?') }}');" method="post">
                        @csrf
                        <button type="submit" class="btn btn-danger fw-medium br-4 ms-3">
                            Delete
                        </button>
                    </form>
                @endif

            </div>

        </div>
    @endforeach


    {{ $users->links() }}

</x-panel-layout>
