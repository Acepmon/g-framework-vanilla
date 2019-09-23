
@if($menu)
<li class="nav-item {{ Auth::user()->menus->where('parent_id', $menu->id)->count() > 0 ? 'nav-item-submenu' : '' }}">
    <a class="nav-link" href="{{ $menu->link }}">
        @if ($menu->icon)
        <i class="{{ $menu->icon}}"></i>
        @endif
        <span>{{ $menu->title }}</span>
    </a>

    @if(Auth::user()->menus->where('parent_id', $menu->id)->count() > 0)
    <ul class="nav nav-group-sub" data-menu-title="{{ $menu->title }}">
        @each('themes.limitless.includes.sidemenus', Auth::user()->menus->where('parent_id', $menu->id)->sortBy('order'), 'menu')
    </ul>
    @endif

</li>
@endif
