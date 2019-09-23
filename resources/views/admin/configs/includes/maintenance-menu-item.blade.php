@if (file_exists(storage_path('framework/down')))
<li class="nav-item">
    @if (Route::has('admin.configs.maintenance'))
        <a href="{{ route('admin.configs.maintenance') }}">
            <span class="label label-inline bg-warning-400 position-right">Maintenance Mode Enabled</span>
        </a>
    @else
        <span class="label label-inline bg-warning-400 position-right">Maintenance Mode Enabled</span>
    @endif
</li>
@endif