<header class="navbar navbar-expand-md d-print-none">
    <div class="container-xl">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu"
            aria-controls="navbar-menu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
            <a href=".">
                <img src="./static/logo.svg" width="110" height="32" alt="Tabler" class="navbar-brand-image">
            </a>
        </h1>
        <div class="navbar-nav flex-row order-md-last">

            <div class="nav-item dropdown">
                <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown"
                    aria-label="Open user menu">
                    <span class="avatar avatar-sm"
                        style="background-image: url(https://dummyimage.com/250x250/000/fff)"></span>
                    <div class="d-none d-xl-block ps-2">
                        <div>{{ auth()->user()->name }}</div>
                        <div class="mt-1 small text-muted">Inventory</div>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <a href="./settings.html" class="dropdown-item">Settings</a>
                    @livewire('pages.admin.logout')
                </div>
            </div>
        </div>
    </div>
</header>
<header class="navbar-expand-md">
    <div class="collapse navbar-collapse" id="navbar-menu">
        <div class="navbar">
            <div class="container-xl">
                <ul class="navbar-nav">
                    <li class="nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('dashboard') }}">
                            <span class="nav-link-title">
                                Dasboard
                            </span>
                        </a>
                    </li>
                    <li
                        class="nav-item {{ request()->routeIs('type.*', 'supplier.*', 'location.*') ? 'active' : '' }} dropdown">
                        <a class="nav-link dropdown-toggle" href="#navbar-help" data-bs-toggle="dropdown"
                            data-bs-auto-close="outside" role="button" aria-expanded="false">

                            <span class="nav-link-title">
                                Master Warehouse
                            </span>
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item {{ request()->routeIs('type.index') ? 'active' : '' }} "
                                href="{{ route('type.index') }}" rel="noopener">
                                List Type
                            </a>
                            <a class="dropdown-item {{ request()->routeIs('location.index') ? 'active' : '' }}"
                                href="{{ route('location.index') }}" rel="noopener">
                                List Location
                            </a>
                            <a class="dropdown-item {{ request()->routeIs('supplier.index') ? 'active' : '' }}"
                                href="{{ route('supplier.index') }}" rel="noopener">
                                List Supplier
                            </a>
                        </div>
                    </li>
                    <li class="nav-item dropdown {{ request()->routeIs('products.*') ? 'active' : '' }}">
                        <a class="nav-link dropdown-toggle" href="#navbar-help" data-bs-toggle="dropdown"
                            data-bs-auto-close="outside" role="button" aria-expanded="false">
                            <span class="nav-link-title">
                                Products
                            </span>
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item {{ request()->routeIs('products.index') ? 'active' : '' }}"
                                href="{{ route('products.index') }}">
                                List Product
                            </a>
                            {{-- <a class="dropdown-item {{ request()->routeIs('location.create') ? 'active' : '' }}"
                                href="{{ route('location.create') }}">
                                Create Location
                            </a> --}}
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</header>
