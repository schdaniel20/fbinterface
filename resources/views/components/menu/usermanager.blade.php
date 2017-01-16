<li class="main-item">
    User Manager
</li>
<li>
    <a href="{{ url('/register') }}">
        <i class="glyphicon glyphicon-user"></i>
        <span>Create User</span>
    </a>
</li>
@if(Auth::user()->hasPermission('view menu type manager'))
<li>
    <a href="{{ url('/types') }}">
        <i class="glyphicon glyphicon-cog"></i>
        <span>User Types</span>
    </a>
</li>
@endif
@if(Auth::user()->hasPermission('manage users'))
<li>
    <a href="{{ url('/user/list') }}">
        <i class="glyphicon glyphicon-list-alt"></i>
        <span>User List</span>
    </a>
</li>
@endif