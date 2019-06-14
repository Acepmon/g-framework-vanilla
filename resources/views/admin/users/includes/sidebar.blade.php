<div class="sidebar-detached">
    <div class="sidebar sidebar-default sidebar-separate">
        <div class="sidebar-content">

            <!-- User details -->
            <div class="content-group">
                <div class="panel-body bg-indigo-400 border-radius-top text-center" style="background-image: url(http://demo.interface.club/limitless/assets/images/bg.png); background-size: contain;">
                    <div class="content-group-sm">
                        <h6 class="text-semibold no-margin-bottom">
                            {{ $user->name }}
                        </h6>

                        <span class="display-block">{{ '@'.$user->username }}</span>
                    </div>

                    <a href="#" class="display-inline-block content-group-sm">
                        <img src="{{ ($user->avatar)?'/storage/'.$user->avatar:'/assets/images/placeholder.jpg'}}" class="img-circle img-responsive" alt="" style="width: 110px; height: 110px;">
                    </a>

                    <ul class="list-inline list-inline-condensed no-margin-bottom">
                        <li><a href="#" class="btn bg-indigo btn-rounded btn-icon"><i class="icon-google-drive"></i></a></li>
                        <li><a href="#" class="btn bg-indigo btn-rounded btn-icon"><i class="icon-twitter"></i></a></li>
                        <li><a href="#" class="btn bg-indigo btn-rounded btn-icon"><i class="icon-github"></i></a></li>
                    </ul>
                </div>

                <div class="panel no-border-top no-border-radius-top">
                    <ul class="navigation">
                        <li class="navigation-header">Navigation</li>
                        <li><a href="{{ route('admin.users.show', ['id' => $user->id]) }}"><i class="icon-files-empty"></i> Profile</a></li>
                        <li><a href="{{ route('admin.users.pages.index', ['id' => $user->id]) }}"><i class="icon-files-empty"></i> Pages</a></li>
                        <li><a href="{{ route('admin.users.permissions.index', ['id' => $user->id]) }}"><i class="icon-files-empty"></i> Permissions</a></li>
                        <li><a href="{{ route('admin.users.settings.index', ['id' => $user->id]) }}"><i class="icon-files-empty"></i> Settings</a></li>
                        @if($user->id == Auth::user()->id)
                        <li><a href="{{ route('admin.profile.notifications') }}"><i class="icon-files-empty"></i> Notifications</a></li>
                        <li class="navigation-divider"></li>
                        <li><a href="{{ route('logout') }}"><i class="icon-switch2"></i> Log out</a></li>
                        @endif
                    </ul>
                </div>
            </div>
            <!-- /user details -->

        </div>
    </div>
</div>
<!-- /detached sidebar -->