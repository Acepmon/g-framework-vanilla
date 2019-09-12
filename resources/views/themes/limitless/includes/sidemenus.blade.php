
@if($menu)
<li class="nav-item">
    <a class="nav-link" href="{{ $menu->link }}">
        @if ($menu->icon)
        <i class="{{ $menu->icon}}"></i>
        @endif
        <span>{{ $menu->title }}</span>
    </a>

    @if(count(Auth::user()->menus->where('parent_id', $menu->id))>0)
    <ul class="nav nav-group-sub">
        @each('themes.limitless.includes.sidemenus', Auth::user()->menus->where('parent_id', $menu->id)->sortBy('order'), 'menu')
    </ul>
    @endif

</li>
@endif
