@hasanyrole('user')
    @props(['prefix' => 'user'])
@endhasanyrole

@hasanyrole('parent')
    @props(['prefix' => 'parent'])
@endhasanyrole

@hasanyrole('teacher')
    @props(['prefix' => 'teacher'])
@endhasanyrole

@hasanyrole('theraphy')
    @props(['prefix' => 'theraphy'])
@endhasanyrole

@hasanyrole('admin')

<li>
    <a href="{{ route('admin.index') }}" class="{{ request()->route()->getName() == 'admin.index' ? 'active':'' }}">
        <div class="icon"><i class="ri-user-line"></i></div>
        Users
    </a>
</li>
<li>
    <a href="{{ route('admin.connects') }}" class="{{ request()->route()->getName() == 'admin.connects' ? 'active':'' }}">
        <div class="icon"><i class="ri-links-line"></i></div>
        Connects
    </a>
</li>
<li>
    <a href="{{ route('admin.orders') }}" class="{{ request()->route()->getName() == 'admin.orders' ? 'active':'' }}">
        <div class="icon"><i class="ri-store-line"></i></div>
        Orders
    </a>
</li>
<li>
    <a href="{{ route('admin.therapy') }}" class="{{ request()->route()->getName() == 'admin.therapy' ? 'active':'' }}">
        <div class="icon"><i class="ri-psychotherapy-line"></i></div>
        Therapy Services
    </a>
</li>
<li>
    <a href="{{ route('admin.helps') }}" class="{{ request()->route()->getName() == 'admin.helps' ? 'active':'' }}">
        <div class="icon"><i class="ri-question-line"></i></div>
        Helps
    </a>
</li>
<li>
    <a href="/admin/user-activity">
        <div class="icon"><i class="ri-line-height"></i></div>
        User Activity Log
    </a>
</li>

@else

<li>
    <a href="{{ route($prefix . '.index') }}" class="{{
        in_array(request()->route()->getName(), [$prefix . '.index', $prefix . '.child_programme']) ? 'active':''
    }}">
        <div class="icon"><i class="ri-file-list-2-line"></i></div>
        Programme
    </a>
</li>
<li>
    <a href="{{ route($prefix . '.reports') }}" class="{{ request()->route()->getName() == $prefix . '.reports' ? 'active':'' }}">
        <div class="icon"><i class="ri-funds-box-line"></i></div>
        Reports
    </a>
</li>
<li>
    <a href="{{ route($prefix . '.connect') }}" class="{{ request()->route()->getName() == $prefix . '.connect' ? 'active':'' }}">
        <div class="icon"><i class="ri-chat-smile-2-line"></i></div>
        Connect
    </a>
</li>

@endhasanyrole



