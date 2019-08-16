<!-- Main sidebar -->
<div class="sidebar sidebar-dark sidebar-main sidebar-expand-md">
    <div class="sidebar-content">

        <!-- User menu -->
        <div class="sidebar-user">
            <div class="card-body">
                <div class="media">
                    <div class="mr-3"> 
                        <a href="{{ (Auth::user()->avatar)?'/storage/'.Auth::user()->avatar:asset('limitless/bootstrap4/images/placeholder.jpg')}}">
                            <img src="{{ (Auth::user()->avatar)?'/storage/'.Auth::user()->avatar:asset('limitless/bootstrap4/images/placeholder.jpg')}}" width="38" height="38" class="rounded-circle" alt="">
                        </a>
                    </div>
                    <div class="media-body">
                        <span class="media-title font-weight-semibold">{{ Auth::user()->name }}</span>
                        <div class="font-size-xs opacity-50">
                            {{ '@'.Auth::user()->username }}
                        </div>
                    </div>

                    <div class="ml-3 align-self-center">
                        <a class="text-white" href="{{ route('admin.profile.settings.index') }}"><i class="icon-cog3"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /user menu -->

        <!-- Main navigation -->
        <div class="card card-sidebar-mobile">
            <ul class="nav nav-sidebar" data-nav-type="accordion">

                @if(true)
                    @foreach(Auth::user()->menus->where('parent_id', NULL)->groupBy('group') as $key=>$group)
                        <li class="nav-item-header"><span>{{ $key }}</span> <i class="icon-menu" title="{{ $key }}"></i></li>
                        @each('themes.limitless.includes.sidemenus', Auth::user()->menus->where('group', $key)->where('parent_id', NULL), 'menu')
                    @endforeach
                @else
                <li class="nav-item-header"><div class="text-uppercase font-size-xs line-height-xs">Overview</div> <i class="icon-menu" title="Overview"></i></li>
                <li><a href="/admin/dashboard"><i class="icon-home4"></i> <span>Dashboard</span></a></li>
                <li><a href="/admin/changelog"><i class="icon-list-unordered"></i> <span>Changelog</span></a></li>
                <li class="nav-item-header"><div class="text-uppercase font-size-xs line-height-xs">System</div> <i class="icon-menu" title="System"></i></li>
                <li class="nav-item nav-item-submenu">
                    <a href="#" class="nav-link"><i class="icon-user-tie"></i><span>System Users</span></a>
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

                <li class="nav-item-header"><div class="text-uppercase font-size-xs line-height-xs">Users</div> <i class="icon-menu" title="Users"></i></li>
                <li><a href="/admin/users"><i class="icon-user"></i> <span>Users</span></a></li>
                <li><a href="/admin/permissions"><i class="icon-key"></i> <span>Permissions</span></a></li>
                <li><a href="/admin/groups"><i class="icon-users2"></i> <span>Groups</span></a></li>

                <li class="nav-item-header"><div class="text-uppercase font-size-xs line-height-xs">>Auction</div> <i class="icon-menu" title="Auction"></i></li>
                <li><a href="/admin/auctions"><i class="icon-hammer2"></i> <span>Auctions</span></a></li>
                <li><a href="/admin/buyers"><i class="icon-people"></i> <span>Buyers / Sellers</span></a></li>
                <li><a href="/admin/items"><i class="icon-cart2"></i> <span>Items</span></a></li>

                <li class="nav-item-header"><div class="text-uppercase font-size-xs line-height-xs">>Content</div> <i class="icon-menu" title="Content"></i></li>
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
        <!-- /main navigation -->

    </div>
</div>
<!-- /main sidebar -->
