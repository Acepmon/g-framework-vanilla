<div class="page-header-content header-elements-inline">
    <div class="page-title d-flex">
        <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Media</span> - @yield('title')</h4>
    </div>
</div>

<!-- Tabs -->
<ul class="nav nav-tabs nav-tabs-bottom mb-0">
    <li class="nav-item"><a href="{{ route('admin.media.index') }}" class="nav-link {{ Route::current()->getName() == 'admin.media.index' ? 'active' : '' }}"><i class="icon-statistics mr-2"></i> Dashboard</a></li>
    <li class="nav-item"><a href="{{ route('admin.media.medias') }}" class="nav-link {{ Route::current()->getName() == 'admin.media.medias' ? 'active' : '' }}"><i class="icon-play mr-2"></i> Media</a></li>
    <li class="nav-item"><a href="{{ route('admin.media.avatars') }}" class="nav-link {{ Route::current()->getName() == 'admin.media.avatars' ? 'active' : '' }}"><i class="icon-vcard mr-2"></i> Avatars</a></li>
    <li class="nav-item"><a href="{{ route('admin.media.thumbnails') }}" class="nav-link {{ Route::current()->getName() == 'admin.media.thumbnails' ? 'active' : '' }}"><i class="icon-image2 mr-2"></i> Thumbnails</a></li>
    <li class="nav-item"><a href="{{ route('admin.media.assets') }}" class="nav-link {{ Route::current()->getName() == 'admin.media.assets' ? 'active' : '' }}"><i class="icon-stack mr-2"></i> Assets</a></li>
    <li class="nav-item"><a href="{{ route('admin.media.upload') }}" class="nav-link {{ Route::current()->getName() == 'admin.media.upload' ? 'active' : '' }}"><i class="icon-plus3 mr-2"></i> Upload File</a></li>
</ul>
<!-- /tabs -->
