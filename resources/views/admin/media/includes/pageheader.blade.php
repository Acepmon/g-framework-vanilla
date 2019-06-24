<div class="page-header-content">
    <div class="page-title">
        <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Media</span> - @yield('title')</h4>
    </div>
</div>

<!-- Tabs -->
<ul class="nav nav-lg nav-tabs nav-tabs-bottom search-results-tabs">
    <li class="{{ Route::current()->getName() == 'admin.media.index' ? 'active' : '' }}"><a href="{{ route('admin.media.index') }}"><i class="icon-statistics position-left"></i> Dashboard</a></li>
    <li class="{{ Route::current()->getName() == 'admin.media.medias' ? 'active' : '' }}"><a href="{{ route('admin.media.medias') }}"><i class="icon-play position-left"></i> Media</a></li>
    <li class="{{ Route::current()->getName() == 'admin.media.avatars' ? 'active' : '' }}"><a href="{{ route('admin.media.avatars') }}"><i class="icon-vcard position-left"></i> Avatars</a></li>
    <li class="{{ Route::current()->getName() == 'admin.media.thumbnails' ? 'active' : '' }}"><a href="{{ route('admin.media.thumbnails') }}"><i class="icon-image2 position-left"></i> Thumbnails</a></li>
    <li class="{{ Route::current()->getName() == 'admin.media.assets' ? 'active' : '' }}"><a href="{{ route('admin.media.assets') }}"><i class="icon-stack position-left"></i> Assets</a></li>
    <li class="{{ Route::current()->getName() == 'admin.media.upload' ? 'active' : '' }}"><a href="{{ route('admin.media.upload') }}"><i class="icon-plus3 position-left"></i> Upload File</a></li>
</ul>
<!-- /tabs -->
