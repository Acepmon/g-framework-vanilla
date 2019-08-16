
@if($menu && $menu->status === 'published' && $menu->visibility === 'public')
<li class="nav-item @if(count(Auth::user()->menus->where('parent_id', $menu->id))>0) nav-item-submenu @endif">
    <a href="{{ $menu->link }}" class=" nav-link">
        <i class="{{ $menu->icon}}"></i>
        <span>{{ $menu->title }}</span>
    </a>

    @if(count(Auth::user()->menus->where('parent_id', $menu->id))>0)
    <ul class="nav nav-group-sub">
        @each('themes.limitless.includes.sidemenus', Auth::user()->menus->where('parent_id', $menu->id), 'menu')
    </ul>
    @endif

</li>
@endif
