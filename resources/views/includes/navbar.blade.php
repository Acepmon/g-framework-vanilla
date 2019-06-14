<!-- Main navbar -->
<div class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="index.html"><img src="/assets/images/logo_light.png" alt=""></a>

        <ul class="nav navbar-nav visible-xs-block">
            <li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
            <li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
        </ul>
    </div>

    <div class="navbar-collapse collapse" id="navbar-mobile">
        <ul class="nav navbar-nav">
            <li><a class="sidebar-control sidebar-main-toggle hidden-xs"><i class="icon-paragraph-justify3"></i></a></li>
        </ul>

        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" id="notificationsDropdownToggle">
                    <i class="icon-bell2"></i>
                    <span class="visible-xs-inline-block position-right">Notifications</span>
                    <span id="notificationsCount" class="badge bg-warning-400">{{ Auth::user()->unreadNotifications->count() }}</span>
                </a>

                <div class="dropdown-menu dropdown-content width-350" id="notificationsDropdown">
                    <div class="dropdown-content-heading">
                        <div class="row">
                            <div class="col-lg-6">
                                <h6 class="panel-title">Notifications</h6>
                            </div>
                            <div class="col-lg-6 text-right">
                                <button onclick="markAsRead()" class="text-white btn btn-primary">Mark as Read</button>
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

                    <div class="dropdown-content-footer">
                        <a href="{{ route('admin.profile.notifications') }}" data-popup="tooltip" title="All Notifications"><i class="icon-menu display-block"></i></a>
                    </div>
                </div>
            </li>


            <li>
                <a href="#">
                    <i class="icon-cog3"></i>
                    <span class="visible-xs-inline-block position-right">Icon link</span>
                </a>
            </li>

            <li class="dropdown dropdown-user">
                <a class="dropdown-toggle" data-toggle="dropdown">
                    <img src="{{ (Auth::user()->avatar)?'/storage/'.Auth::user()->avatar:'/assets/images/placeholder.jpg'}}" alt="">
                    <span>{{ Auth::user()->name }}</span>
                    <i class="caret"></i>
                </a>

                <ul class="dropdown-menu dropdown-menu-right">
                    <li><a href="{{ route('admin.profile.index') }}"><i class="icon-user-plus"></i> My profile</a></li>
                    <li><a href="#"><i class="icon-coins"></i> My balance</a></li>
                    <li><a href="#"><span class="badge badge-warning pull-right">58</span> <i class="icon-comment-discussion"></i> Messages</a></li>
                    <li class="divider"></li>
                    <li><a href="#"><i class="icon-cog5"></i> Account settings</a></li>
                    <li>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="icon-switch2"></i> Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
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
        $("#notificationsCount").html(0);
        $("#notificationsList").html('<div class="text-center">You do not have any notifications</div>');
    });
}
</script>
