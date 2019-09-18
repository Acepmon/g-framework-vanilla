<div class="sidebar sidebar-light sidebar-component sidebar-component-left sidebar-expand-md">
    <div class="sidebar-content">

            <!-- User details -->
                <div class="card">
                    <div class="card-body border-radius-top text-center">
                        <div class="content-group-sm">
                            <h6 class="text-semibold no-margin-bottom">
                                {{ $user->name }}
                            </h6>

                            <span class="display-block">{{ '@'.$user->username }}</span>
                        </div>

                        <a href="{{ $user->avatar_url()}}" target="_blank" class="display-inline-block content-group-sm">
                            <img src="{{ $user->avatar_url()}}" class="rounded-circle mr-2" alt="" style="width: 110px; height: 110px;">
                        </a>
                    </div>
                </div>

                <div class="card card-sidebar-mobile">
                    <ul class="nav nav-sidebar" data-nav-type="accordion">
                        <li class="nav-item-header">Navigation</li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('admin.profile.index') }}"><i class="icon-user"></i> Profile</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('admin.profile.contents.index', ['type' => 'page']) }}"><i class="icon-files-empty2"></i> <span>Pages</span></a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('admin.profile.contents.index', ['type' => 'post']) }}"><i class="icon-blog"></i> <span>Blog Posts</span></a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('admin.profile.permissions.index') }}"><i class="icon-key"></i> Permissions</a></li>
                        @auth
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.profile.notifications.index') }}"><i class="icon-bell2"></i> Notifications
                                @if (Auth::user()->unreadNotifications->count() > 0)
                                <span id="notificationsCount" class="badge bg-warning-400">{{ Auth::user()->unreadNotifications->count() }}</span>
                                @endif
                            </a>
                        </li>
                        <li class="navigation-divider"></li>
                        <li class="nav-item">

                            <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="icon-switch2"></i> Logout</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                        @endauth
                    </ul>
                </div>
            <!-- /user details -->
    </div>
</div>
<!-- /detached sidebar -->
