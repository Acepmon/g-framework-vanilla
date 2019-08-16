<div class="page-header-content header-elements-inline">
    <div class="page-title d-flex">
        <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Media</span> - @yield('title')</h4>
    </div>
</div>

<!-- Tabs -->
<ul class="nav nav-tabs nav-tabs-bottom">
    <li class="nav-item {{ Route::current()->getName() == 'admin.media.index' ? 'active' : '' }}"><a href="{{ route('admin.media.index') }}"><i class="icon-statistics mr-2"></i> Dashboard</a></li>
    <li class="nav-item {{ Route::current()->getName() == 'admin.media.medias' ? 'active' : '' }}"><a href="{{ route('admin.media.medias') }}"><i class="icon-play mr-2"></i> Media</a></li>
    <li class="nav-item {{ Route::current()->getName() == 'admin.media.avatars' ? 'active' : '' }}"><a href="{{ route('admin.media.avatars') }}"><i class="icon-vcard mr-2"></i> Avatars</a></li>
    <li class="nav-item {{ Route::current()->getName() == 'admin.media.thumbnails' ? 'active' : '' }}"><a href="{{ route('admin.media.thumbnails') }}"><i class="icon-image2 mr-2"></i> Thumbnails</a></li>
    <li class="nav-item {{ Route::current()->getName() == 'admin.media.assets' ? 'active' : '' }}"><a href="{{ route('admin.media.assets') }}"><i class="icon-stack mr-2"></i> Assets</a></li>
    <li class="nav-item {{ Route::current()->getName() == 'admin.media.upload' ? 'active' : '' }}"><a href="{{ route('admin.media.upload') }}"><i class="icon-plus3 mr-2"></i> Upload File</a></li>
</ul>
<!-- /tabs -->
