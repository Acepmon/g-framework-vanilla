<!-- Main sidebar -->
<div class="sidebar sidebar-main">
    <div class="sidebar-content">

        <!-- User menu -->
        <div class="sidebar-user">
            <div class="category-content">
                <div class="media">
                    <a href="{{ (Auth::user()->avatar)?'/storage/'.Auth::user()->avatar:'/assets/images/placeholder.jpg'}}" target="_blank" class="media-left">
                        <img src="{{ (Auth::user()->avatar)?'/storage/'.Auth::user()->avatar:'/assets/images/placeholder.jpg'}}" class="img-circle img-sm" alt="">
                    </a>
                    <div class="media-body">
                        <span class="media-heading text-semibold">{{ Auth::user()->name }}</span>
                        <div class="text-size-mini text-muted">
                            {{ '@'.Auth::user()->username }}
                        </div>
                    </div>

                    <div class="media-right media-middle">
                        <ul class="icons-list">
                            <li>
                                <a href="{{ route('admin.profile.settings.index') }}"><i class="icon-cog3"></i></a>
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

                    @if(true)
                        @each('admin.includes.sidemenus', Auth::user()->menus->where('parent_id', NULL), 'menu')
                    @else
                    <li class="navigation-header"><span>Overview</span> <i class="icon-menu" title="Overview"></i></li>
                    <li><a href="/admin/dashboard"><i class="icon-home4"></i> <span>Dashboard</span></a></li>
                    <li><a href="/admin/changelog"><i class="icon-list-unordered"></i> <span>Changelog</span></a></li>

                    <li class="navigation-header"><span>System</span> <i class="icon-menu" title="System"></i></li>
                    <li>
                        <a href="#"><i class="icon-user-tie"></i> <span>System Users</span></a>
                        <ul>
                            <li><a href="/admin/users/administrators">Administrators</a></li>
                            <li><a href="/admin/users/operators">Operators</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="icon-gear"></i> <span>Configurations</span></a>
                        <ul>
                            <li><a href="/admin/configs/maintenance">Maintenance Mode</a></li>
                            <li class="navigation-divider"></li>
                            <li><a href="/admin/configs/base">Base Configurations</a></li>
                            <li><a href="/admin/configs/system">System Configurations</a></li>
                            <li><a href="/admin/configs/themes">Themes Configurations</a></li>
                            <li><a href="/admin/configs/plugins">Plugins Configurations</a></li>
                            <li><a href="/admin/configs/security">Security Configurations</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="icon-puzzle2"></i> <span>Plugins</span></a>
                        <ul>
                            <li><a href="/admin/plugins/">Installed Plugins</a></li>
                            <li><a href="/admin/plugins/create">Add New</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="icon-brush"></i> <span>Themes</span></a>
                        <ul>
                            <li><a href="/admin/themes/">Installed Themes</a></li>
                            <li><a href="/admin/themes/create">Add New</a></li>
                            <li><a href="/admin/themes/layouts">Layouts</a></li>
                            <li><a href="/admin/themes/editor">Editor</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="icon-mail5"></i> <span>Notifications</span></a>
                        <ul>
                            <li><a href="/admin/notifications/channels">Channels</a></li>
                            <li><a href="/admin/notifications/triggers">Triggers</a></li>
                            <li><a href="/admin/notifications/events">Events</a></li>
                            <li><a href="/admin/notifications/mail">Mail Templates</a></li>
                            <li><a href="/admin/notifications/database">Notification Messages</a></li>
                            <li><a href="/admin/notifications/sms">SMS Messages</a></li>
                            <li><a href="/admin/notifications/broadcast">Broadcast Messages</a></li>
                        </ul>
                    </li>
                    <li><a href="/admin/backups"><i class="icon-database"></i> <span>Backups</span></a></li>
                    <li><a href="/admin/logs"><i class="icon-archive"></i> <span>Logs</span></a></li>

                    <li class="navigation-header"><span>Users</span> <i class="icon-menu" title="Users"></i></li>
                    <li><a href="/admin/users"><i class="icon-user"></i> <span>Users</span></a></li>
                    <li><a href="/admin/permissions"><i class="icon-key"></i> <span>Permissions</span></a></li>
                    <li><a href="/admin/groups"><i class="icon-users2"></i> <span>Groups</span></a></li>

                    <li class="navigation-header"><span>Auction</span> <i class="icon-menu" title="Auction"></i></li>
                    <li><a href="/admin/auctions"><i class="icon-hammer2"></i> <span>Auctions</span></a></li>
                    <li><a href="/admin/buyers"><i class="icon-people"></i> <span>Buyers / Sellers</span></a></li>
                    <li><a href="/admin/items"><i class="icon-cart2"></i> <span>Items</span></a></li>

                    <li class="navigation-header"><span>Content</span> <i class="icon-menu" title="Content"></i></li>
                    <li><a href="/admin/menus"><i class="icon-menu2"></i> <span>Menus</span></a></li>
                    <li><a href="/admin/contents?type=page"><i class="icon-files-empty2"></i> <span>Pages</span></a></li>
                    <li><a href="/admin/contents?type=post"><i class="icon-blog"></i> <span>Blog Posts</span></a></li>
                    <li><a href="/admin/comments"><i class="icon-comment"></i> <span>Comments</span></a></li>
                    <li><a href="/admin/media"><i class="icon-media"></i> <span>Media & Assets</span></a></li>
                    <li><a href="/admin/localization"><i class="icon-flag3"></i> <span>Localization</span></a></li>
                    <li><a href="/admin/taxonomy?taxonomy=category"><i class="icon-grid6"></i> <span>Categories</span></a></li>
                    <li><a href="/admin/taxonomy?taxonomy=tag"><i class="icon-price-tag2"></i> <span>Tags</span></a></li>

                    @endif
                </ul>
            </div>
        </div>
        <!-- /main navigation -->

    </div>
</div>
<!-- /main sidebar -->
