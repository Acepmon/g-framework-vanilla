@if (file_exists(storage_path('framework/down')))
<li class="nav-item">
    @if (Route::has('admin.configs.maintenance'))
        <a href="{{ route('admin.configs.maintenance') }}" class="navbar-nav-link">
            <span class="badge bg-warning-400 position-static ml-auto ml-xl-2">Maintenance Mode Enabled</span>
        </a>
    @else
        <span class="badge bg-warning-400 position-static ml-auto ml-xl-2">Maintenance Mode Enabled</span>
    @endif
</li>
@endif