<div class="sidebar-detached">
    <div class="sidebar sidebar-default sidebar-separate">
        <div class="sidebar-content">

            <!-- User details -->
            <div class="content-group">
                <div class="card">
                    <div class="card-body border-radius-top">
                        @include('themes.limitless.includes.user-media', $user)
                    </div>
                </div>

                <div class="card no-border-top no-border-radius-top">
                    <ul class="navigation">
                        <li class="navigation-header">Navigation</li>
                        <li><a href="{{ route('admin.users.show', ['id' => $user->id]) }}"><i class="icon-user"></i> Profile</a></li>
                        <li><a href="{{ route('admin.users.contents.index', ['id' => $user->id, 'type' => 'page']) }}"><i class="icon-files-empty2"></i> <span>Pages</span></a></li>
                        <li><a href="{{ route('admin.users.contents.index', ['id' => $user->id, 'type' => 'post']) }}"><i class="icon-blog"></i> <span>Blog Posts</span></a></li>
                        <li><a href="{{ route('admin.users.permissions.index', ['id' => $user->id]) }}"><i class="icon-key"></i> Permissions</a></li>
                        <li><a href="{{ route('admin.users.groups.index', ['id' => $user->id]) }}"><i class="icon-users2"></i> Groups</a></a></li>
                        <li><a href="{{ route('admin.users.settings.index', ['id' => $user->id]) }}"><i class="icon-gear"></i> Settings</a></li>
                    </ul>
                </div>
            </div>
            <!-- /user details -->

        </div>
    </div>
</div>
<!-- /detached sidebar -->
