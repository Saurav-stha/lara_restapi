<div class="d-flex flex-column flex-shrink-0 p-3 bg-light" style="width:20em;">
    
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a href="{{ url('/dashboard') }}" class="nav-link {{ request()->is('dashboard') ? 'active' : '' }}">
                <i class="bi bi-house-door-fill me-2"></i> Dashboard
            </a>
        </li>
        <li>
            <a href="{{ url('/users') }}" class="nav-link {{ request()->is('users') ? 'active' : '' }}">
                <i class="bi bi-people-fill me-2"></i> Users
            </a>
        </li>
        <li>
            <a href="{{ url('/settings') }}" class="nav-link {{ request()->is('settings') ? 'active' : '' }}">
                <i class="bi bi-gear-fill me-2"></i> Settings
            </a>
        </li>
        <li>
            <a href="{{ url('/reports') }}" class="nav-link {{ request()->is('reports') ? 'active' : '' }}">
                <i class="bi bi-file-earmark-bar-graph-fill me-2"></i> Reports
            </a>
        </li>
    </ul>
    <hr>
</div>
