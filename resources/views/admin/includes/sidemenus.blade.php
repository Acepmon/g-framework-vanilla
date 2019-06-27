
@if($menu && $menu->status === 'published' && $menu->visibility === 'public')
<li>
    <a href="{{ $menu->link }}">
        <i class="{{ $menu->icon}}"></i>
        <span>{{ $menu->title }}</span>
    </a>

    @if(count(Auth::user()->menus->where('parent_id', $menu->id))>0)
    <ul>
        @each('admin.includes.sidemenus', Auth::user()->menus->where('parent_id', $menu->id), 'menu')
    </ul>
    @endif

</li>
@endif
