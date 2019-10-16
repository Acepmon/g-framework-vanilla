<!-- Left sidebar component -->
<div class="sidebar sidebar-light bg-transparent sidebar-component sidebar-component-left border-0 shadow-0 sidebar-expand-md">

    <!-- Sidebar content -->
    <div class="sidebar-content">

        <!-- Sub navigation -->
        <div class="card">
            <div class="card-header bg-transparent header-elements-inline">
                <span class="text-uppercase font-size-sm font-weight-semibold">Finance Calculations</span>
                <div class="header-elements">
                    <div class="list-icons">
                        <a class="list-icons-item" data-action="collapse"></a>
                    </div>
                </div>
            </div>

            <div class="card-body p-0">
                <ul class="nav nav-sidebar mb-2" data-nav-type="accordion">
                    <li class="nav-item">
                        <a href="{{ route('admin.modules.car.options.show', 'car-advance-payments') }}" class="nav-link {{ request()->is('admin/modules/car/options/car-advance-payments') ? 'active' : '' }}">
                            Advance Payment Percents
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.modules.car.options.show', 'car-loan-terms') }}" class="nav-link {{ request()->is('admin/modules/car/options/car-loan-terms') ? 'active' : '' }}">
                            Loan Terms
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="card">
            <div class="card-header bg-transparent header-elements-inline">
                <span class="text-uppercase font-size-sm font-weight-semibold">Pricings</span>
                <div class="header-elements">
                    <div class="list-icons">
                        <a class="list-icons-item" data-action="collapse"></a>
                    </div>
                </div>
            </div>

            <div class="card-body p-0">
                <ul class="nav nav-sidebar mb-2" data-nav-type="accordion">
                    <li class="nav-item">
                        <a href="{{ route('admin.modules.car.options.show', 'best_premium') }}" class="nav-link {{ request()->is('admin/modules/car/options/best_premium') ? 'active' : '' }}">
                            Best Premium
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.modules.car.options.show', 'premium') }}" class="nav-link {{ request()->is('admin/modules/car/options/premium') ? 'active' : '' }}">
                            Premium
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="card">
            <div class="card-header bg-transparent header-elements-inline">
                <span class="text-uppercase font-size-sm font-weight-semibold">Car Specs</span>
                <div class="header-elements">
                    <div class="list-icons">
                        <a class="list-icons-item" data-action="collapse"></a>
                    </div>
                </div>
            </div>

            <div class="card-body p-0">
                <ul class="nav nav-sidebar mb-2" data-nav-type="accordion">
                    <li class="nav-item">
                        <a href="{{ route('admin.modules.car.options.show', 'car-advantages') }}" class="nav-link {{ request()->is('admin/modules/car/options/car-advantages') ? 'active' : '' }}">
                            Advantages
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.modules.car.options.show', 'car-type') }}" class="nav-link {{ request()->is('admin/modules/car/options/car-type') ? 'active' : '' }}">
                            Car Type
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.modules.car.options.show', 'car-fuel') }}" class="nav-link {{ request()->is('admin/modules/car/options/car-fuel') ? 'active' : '' }}">
                            Fuel Type
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.modules.car.options.show', 'car-transmission') }}" class="nav-link {{ request()->is('admin/modules/car/options/car-transmission') ? 'active' : '' }}">
                            Transmission
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.modules.car.options.show', 'provinces') }}" class="nav-link {{ request()->is('admin/modules/car/options/provinces') ? 'active' : '' }}">
                            Provinces
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.modules.car.options.show', 'car-colors') }}" class="nav-link {{ request()->is('admin/modules/car/options/car-colors') ? 'active' : '' }}">
                            Car Colors
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.modules.car.options.show', 'car-wheel-pos') }}" class="nav-link {{ request()->is('admin/modules/car/options/car-wheel-pos') ? 'active' : '' }}">
                            Wheel Positions
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.modules.car.options.show', 'car-wheel') }}" class="nav-link {{ request()->is('admin/modules/car/options/car-wheel') ? 'active' : '' }}">
                            Wheel
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.modules.car.options.show', 'car-accident') }}" class="nav-link {{ request()->is('admin/modules/car/options/car-accident') ? 'active' : '' }}">
                            Accidents
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.modules.car.options.show', 'car-mancount') }}" class="nav-link {{ request()->is('admin/modules/car/options/car-mancount') ? 'active' : '' }}">
                            Passengers
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.modules.car.options.show', 'car-conditions') }}" class="nav-link {{ request()->is('admin/modules/car/options/car-conditions') ? 'active' : '' }}">
                            Conditions
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="card">
            <div class="card-header bg-transparent header-elements-inline">
                <span class="text-uppercase font-size-sm font-weight-semibold">Car Options</span>
                <div class="header-elements">
                    <div class="list-icons">
                        <a class="list-icons-item" data-action="collapse"></a>
                    </div>
                </div>
            </div>

            <div class="card-body p-0">
                <ul class="nav nav-sidebar mb-2" data-nav-type="accordion">
                    <li class="nav-item">
                        <a href="{{ route('admin.modules.car.options.show', 'car-exterior') }}" class="nav-link {{ request()->is('admin/modules/car/options/car-exterior') ? 'active' : '' }}">
                            Exterior
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.modules.car.options.show', 'car-guts') }}" class="nav-link {{ request()->is('admin/modules/car/options/car-guts') ? 'active' : '' }}">
                            Guts
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.modules.car.options.show', 'car-safety') }}" class="nav-link {{ request()->is('admin/modules/car/options/car-safety') ? 'active' : '' }}">
                            Safety
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.modules.car.options.show', 'car-convenience') }}" class="nav-link {{ request()->is('admin/modules/car/options/car-convenience') ? 'active' : '' }}">
                            Convenience
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="card">
            <div class="card-header bg-transparent header-elements-inline">
                <span class="text-uppercase font-size-sm font-weight-semibold">Manufacturers</span>
                <div class="header-elements">
                    <div class="list-icons">
                        <a class="list-icons-item" data-action="collapse"></a>
                    </div>
                </div>
            </div>

            <div class="card-body p-0">
                <ul class="nav nav-sidebar mb-2" data-nav-type="accordion">
                    @foreach (\App\Entities\TaxonomyManager::collection('car-manufacturer') as $manufacturer)
                        <li class="nav-item">
                            <a href="{{ route('admin.modules.car.options.show', 'car-' . \Str::kebab($manufacturer->term->name)) }}" class="nav-link {{ request()->is('admin/modules/car/options/car-' . \Str::kebab($manufacturer->term->name)) ? 'active' : '' }}">
                                <div class="mr-3">
                                    <img src="{{ $manufacturer->term->metaValue('logo') }}" class="rounded-circle" width="30" alt="">
                                </div>
                                {{ $manufacturer->term->name }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <!-- /sub navigation -->

    </div>
    <!-- /sidebar content -->

</div>
<!-- /left sidebar component -->
