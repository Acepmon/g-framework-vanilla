<!-- Main sidebar -->
<div class="sidebar sidebar-main">
    <div class="sidebar-content">

        <!-- Main navigation -->
        <div class="sidebar-category sidebar-category-visible">
            <div class="category-content no-padding">
                <ul class="navigation navigation-alt navigation-accordion">
                    @foreach(Auth::user()->menus->where('parent_id', 1)->groupBy('group')->sortBy('order') as $key => $group)
                        <li class="navigation-header">
                            <span>{{ $key }}</span>
                            <i class="icon-menu" title="{{ $key }}"></i>
                        </li>

                        @each('themes.limitless.includes.sidemenus', Auth::user()->menus->where('group', $key)->where('parent_id', 1)->sortBy('order'), 'menu')
                    @endforeach
                </ul>
            </div>
        </div>
        <!-- /main navigation -->

    </div>
</div>
<!-- /main sidebar -->
