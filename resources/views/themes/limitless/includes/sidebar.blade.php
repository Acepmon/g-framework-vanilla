<!-- Main sidebar -->
<div class="sidebar sidebar-dark sidebar-main sidebar-expand-md">
    <div class="sidebar-content">

        <!-- Main navigation -->
        <div class="card card-sidebar-mobile">
            <ul class="nav nav-sidebar" data-nav-type="accordion">
                @foreach(Auth::user()->menus->where('parent_id', 1)->groupBy('group')->sortBy('order') as $key => $group)
                    <li class="nav-item-header">
                        <span>{{ $key }}</span>
                        <i class="icon-menu" title="{{ $key }}"></i>
                    </li>

                    @each('themes.limitless.includes.sidemenus', Auth::user()->menus->where('group', $key)->where('parent_id', 1)->sortBy('order'), 'menu')
                @endforeach
            </ul>
        </div>
        <!-- /main navigation -->

    </div>
</div>
<!-- /main sidebar -->
