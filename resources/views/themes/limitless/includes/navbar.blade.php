<!-- Main navbar -->
<div class="navbar navbar-expand-md navbar-dark">
    <div class="navbar-header navbar-dark d-none d-md-flex align-items-md-center">
        <div class="navbar-brand">
            <a class="d-inline-block" href="{{ route('admin.dashboard') }}"><img src="{{ asset('limitless/bootstrap4/images/logo_light.png') }}" alt></a>
        </div>

        <!-- <ul class="nav navbar-nav visible-xs-block">
            <li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
            <li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
        </ul> -->
    </div>

    <div class="collapse navbar-collapse" id="navbar-mobile">
        <ul class="navbar-nav">
            <li class="nav-item"><a class="navbar-nav-link sidebar-control sidebar-main-toggle d-none d-md-block"><i class="icon-paragraph-justify3"></i></a></li>

            @if (file_exists(storage_path('framework/down')))
            <li class="nav-item">
                <a href="{{ route('admin.configs.maintenance') }}">
                    <span class="label label-inline bg-warning-400 position-right">Maintenance Mode Enabled</span>
                </a>
            </li>
            @endif
        </ul>

        <ul class="navbar-nav ml-xl-auto">
            <li class="nav-item dropdown">
                <a href="#" class="navbar-nav-link dropdown-toggle" data-toggle="dropdown" id="notificationsDropdownToggle" aria-expanded="false">
                    <i class="icon-bell2"></i>
                    <span class="visible-xs-inline-block position-right">Notifications</span>
                    @if (Auth::user()->unreadNotifications->count() > 0)
                    <span id="notificationsCount" class="badge bg-warning-400">{{ Auth::user()->unreadNotifications->count() }}</span>
                    @endif
                </a>

                <div class="dropdown-menu dropdown-menu-right dropdown-content wmin-md-350" id="notificationsDropdown">
                    <div class="dropdown-content-heading">
                        <div class="row">
                            <div class="col-lg-6">
                                <h6 class="font-weight-semibold">Notifications</h6>
                            </div>
                            <div class="col-lg-6 text-right">
                                <button onclick="markAsRead()" id="notificationsMarkReadBtn" class="text-white btn btn-primary btn-sm" {{ Auth::user()->unreadNotifications->count() > 0 ? '' : 'disabled' }}>Mark as Read</button>
                            </div>
                        </div>
                    </div>

                    <ul class="media-list dropdown-content-body" id="notificationsList">
                        @foreach(Auth::user()->unreadNotifications as $notification)
                        <li class="media">
                            @if (!empty($notification->data['thumbnail']))
                            <div class="media-left">
                                <img src="{{ $notification->data['thumbnail'] }}" class="img-circle img-sm" alt="">
                            </div>
                            @endif

                            <div class="media-body">
                                <a href="#" class="media-heading">
                                    <span class="text-semibold">{{ $notification->data['title'] }}</span>
                                    <span class="media-annotation pull-right">{{ $notification->created_at }}</span>
                                </a>

                                <span class="text-muted">{{ $notification->data['body'] }}</span>
                            </div>
                        </li>
                        @endforeach

                        @if(count(Auth::user()->unreadNotifications) == 0)
                        <div class="text-center">You do not have any notifications</div>
                        @endif
                    </ul>

                    <div class="dropdown-content-footer justify-content-center p-0">
                        <a href="{{ route('admin.profile.notifications.index') }}" data-popup="tooltip" title="All Notifications"><i class="icon-menu display-block"></i></a>
                    </div>
                </div>
            </li>


            <li class="nav-item">
                <a class="navbar-nav-link" href="{{ route('admin.configs.index') }}">Configurations</a>
            </li>

            <li class="nav-item dropdown dropdown-user">
                <a class="navbar-nav-link d-flex align-items-center dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img class="rounded-circle mr-2" src="{{ Auth::user()->avatar }}" height="34" alt="">
                    <span>{{ Auth::user()->name }}</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a href="{{ route('admin.profile.index') }}" class="dropdown-item"><i class="icon-user-plus"></i> My profile</a>
                    <a href="#" class="dropdown-item"><i class="icon-coins"></i> My balance</a>
                    <a href="#" class="dropdown-item"><i class="icon-comment-discussion"></i>Messages<span class="badge badge-pill bg-blue ml-auto">58</span></a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item"><i class="icon-cog5"></i> Account settings</a>
                    <div>
                        <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="icon-switch2"></i> Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</div>
<!-- /main navbar -->

<script>

function markAsRead() {
    $.ajax({
        url: '/admin/profile/notifications/read'
    }).done(function() {
        $("#notificationsCount").remove();
        $("#notificationsMarkReadBtn").attr('disabled', true);
        $("#notificationsList").html('<div class="text-center">You do not have any notifications</div>');
    });
}
</script>
