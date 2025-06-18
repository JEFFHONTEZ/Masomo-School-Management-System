{{--My Children--}}
<li class="nav-item">
    <a href="{{ route('my_children') }}" class="nav-link {{ in_array(Route::currentRouteName(), ['my_children']) ? 'active' : '' }}">
        <i class="icon-users4"></i>
        <span class="menu-text">My Children</span>
    </a>
</li>
{{--Fees--}}
<li class="nav-item">
    <a href="{{ route('parent.fees') }}" class="nav-link {{ in_array(Route::currentRouteName(), ['parent.fees']) ? 'active' : '' }}">
        <i class="icon-cash2"></i>
        <span class="menu-text">Fees</span>
    </a>
</li>