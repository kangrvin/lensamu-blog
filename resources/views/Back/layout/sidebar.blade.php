<div class="sidebar border border-right p-0 bg-body-tertiary"
    style="position: fixed; top: 56px; left: 0; height: calc(100vh - 56px); width: 200px; overflow-y: auto; z-index: 1030;">
    <div class="offcanvas-md offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu"
        aria-labelledby="sidebarMenuLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="sidebarMenuLabel">Company name</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu"
                aria-label="Close"></button>
        </div>
        <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2 {{ Request::is('dashboard') ? 'active' : '' }}"
                        href="{{ url('dashboard') }}">
                        <svg class="bi" aria-hidden="true">
                            <use xlink:href="#house-fill"></use>
                        </svg>
                        Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2 {{ Request::is('article') ? 'active' : '' }}"
                        href="{{ url('article') }}">
                        <svg class="bi" aria-hidden="true">
                            <use xlink:href="#file-earmark"></use>
                        </svg>
                        Articles
                    </a>
                </li>

                @if (auth()->user()->role == 1)
                    <li class="nav-item">
                        <a class="nav-link d-flex align-items-center gap-2 {{ Request::is('categories') ? 'active' : '' }}"
                            href="{{ url('categories') }}">
                            <svg class="bi" aria-hidden="true">
                                <use xlink:href="#folder"></use>
                            </svg>
                            Categories
                        </a>
                    </li>
                @endif

                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2 {{ Request::is('config') ? 'active' : '' }}"
                        href="{{ url('config') }}">
                        <svg class="bi" aria-hidden="true">
                            <use xlink:href="#list"></use>
                        </svg>
                        Config
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2 {{ Request::is('users') ? 'active' : '' }}"
                        href="{{ url('users') }}">
                        <svg class="bi" aria-hidden="true">
                            <use xlink:href="#people"></use>
                        </svg>
                        Users
                    </a>
                </li>

                <li class="nav-item">
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                    <a class="nav-link d-flex align-items-center gap-2" href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <svg class="bi" aria-hidden="true">
                            <use xlink:href="#graph-up"></use>
                        </svg>
                        Logout
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
