<ul class="sidebar-nav">
<div class="user-panel">
    <div class="user-panel-head text-center">
        <img class="user-pic" src="/image/default.png"></img>
    </div>
    <div class="user-panel-body text-center">
        <span class="user-name">
            {{ Auth::user()->name ?? "" }} 
        </span>
    </div>
</div>        
    
    @if(Auth::user()->hasPermission('view menu session'))
        @include('components.menu.session')
    @endif
    
    @if(Auth::user()->hasPermission('view menu administrator'))
        @include('components.menu.usermanager')
    @endif
    @if(Auth::user()->hasPermission('view menu servers'))
        @include('components.menu.servers')
    @endif
    
   
</ul>