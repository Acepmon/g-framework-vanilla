<!-- Main sidebar -->
<div class="sidebar sidebar-main">
    <div class="sidebar-content">

        <!-- User menu -->
        <div class="sidebar-user">
            <div class="category-content">
                <div class="media">
                    <a href="#" class="media-left"><img src="/assets/images/image.png" class="img-circle img-sm" alt=""></a>
                    <div class="media-body">
                        <span class="media-heading text-semibold">{{ Auth::user()->name }}</span>
                        <div class="text-size-mini text-muted">
                            <i class="icon-pin text-size-small"></i> &nbsp;Santa Ana, CA
                        </div>
                    </div>

                    <div class="media-right media-middle">
                        <ul class="icons-list">
                            <li>
                                <a href="#"><i class="icon-cog3"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- /user menu -->

        <!-- Main navigation -->
        <div class="sidebar-category sidebar-category-visible">
            <div class="category-content no-padding">
                <ul class="navigation navigation-alt navigation-accordion">

                    @if(False)
                    @each('includes.sidemenus', Auth::user()->menus->where('parent_id', NULL), 'menu')
                    @endif

                    <li class="navigation-header"><span>System</span> <i class="icon-menu" title="Core Features"></i></li>
                    <li><a href="/admin/dashboard"><i class="icon-home4"></i> <span>Dashboard</span></a></li>
                    <li><a href="/admin/menus"><i class="icon-menu2"></i> <span>Menus</span></a></li>
                    <li><a href="/admin/users"><i class="icon-users"></i> <span>Users</span></a></li>
                    <li><a href="/admin/permissions"><i class="icon-key"></i> <span>Permissions</span></a></li>
                    <li><a href="/admin/groups"><i class="icon-users2"></i> <span>Groups</span></a></li>
                    <li><a href="/admin/pages"><i class="icon-files-empty2"></i> <span>Pages</span></a></li>
                    <li><a href="/admin/terms"><i class="icon-price-tag2"></i> <span>Terms & Taxonomy</span></a></li>
                    <li><a href="/admin/plugins"><i class="icon-puzzle2"></i> <span>Plugins</span></a></li>
                    <li><a href="/admin/themes"><i class="icon-display4"></i> <span>Themes</span></a></li>
                    <li><a href="/admin/configs"><i class="icon-gear"></i> <span>Configurations</span></a></li>
                    <li><a href="/admin/changelog"><i class="icon-list-unordered"></i> <span>Changelog</span></a></li>

                </ul>
            </div>
        </div>
        <!-- /main navigation -->

    </div>
</div>
<!-- /main sidebar -->
