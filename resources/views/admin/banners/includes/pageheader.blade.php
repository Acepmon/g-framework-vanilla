<div class="page-header-content header-elements-inline">
    <div class="page-title d-flex">
        <h4><i class="icon-arrow-left52 ml-2"></i> <span class="font-weight-semibold">Banners</span> - @yield('title')</h4>
    </div>

    <div class="header-elements d-none">
        <div class="d-flex justify-content-center">
            <a href="{{ route('admin.banners.create') }}" class="btn btn-link btn-float text-default"><i class="icon-plus3 text-primary"></i><span>New Banner</span></a>
        </div>
    </div>
</div>

<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
    <div class="d-flex">
        <div class="breadcrumb">
            <a class="breadcrumb-item" href="{{ route('admin.dashboard') }}"><i class="icon-home2 position-left"></i> Home</a>
            <a class="breadcrumb-item" href="{{ route('admin.banners.index') }}">Banners</a>
            <span class="breadcrumb-item active">Detail</span>
        </div>
    </div>

    <div class="breadcrumb-elements-item dropdown p-0">
        <a href="{{ route('admin.banners.locations.index') }}" class="breadcrumb-elements-item">
            Banner Locations
        </a>
    </div>
</div>
