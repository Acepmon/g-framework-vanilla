<div class="sidebar-detached">
    <div class="sidebar sidebar-default sidebar-separate">
        <div class="sidebar-content">

            <!-- User details -->
            <div class="content-group">
                <div class="panel">
                    <div class="panel-body border-radius-top">
                        <div class="media">
                            <a href="{{ ($user->avatar)?'/storage/'.$user->avatar:'{{ admin_asset('images/placeholder.jpg') }}'}}" target="_blank" class="media-left">
                                <img src="{{ ($user->avatar)?'/storage/'.$user->avatar:'{{ admin_asset('images/placeholder.jpg') }}'}}" class="img-circle img-sm" alt="">
                            </a>
                            <div class="media-body">
                                <span class="media-heading text-semibold">{{ $user->name }}</span>
                                <div class="text-size-mini text-muted">
                                    {{ '@'.$user->username }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="panel no-border-top no-border-radius-top">
                    <ul class="navigation">
                        <li class="navigation-header">Navigation</li>
                        <li><a href="{{ route('admin.users.show', ['id' => $user->id]) }}"><i class="icon-user"></i> Profile</a></li>
                        <li><a href="{{ route('admin.users.contents.index', ['id' => $user->id, 'type' => 'page']) }}"><i class="icon-files-empty2"></i> <span>Pages</span></a></li>
                        <li><a href="{{ route('admin.users.contents.index', ['id' => $user->id, 'type' => 'post']) }}"><i class="icon-blog"></i> <span>Blog Posts</span></a></li>
                        <li><a href="{{ route('admin.users.permissions.index', ['id' => $user->id]) }}"><i class="icon-key"></i> Permissions</a></li>
                        <li><a href="{{ route('admin.users.settings.index', ['id' => $user->id]) }}"><i class="icon-gear"></i> Settings</a></li>
                    </ul>
                </div>
            </div>
            <!-- /user details -->

        </div>
    </div>
</div>
<!-- /detached sidebar -->
