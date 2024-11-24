<div class="sidebar" style="width: 17%">
    <div class="sidebar-header">
        <h1>Havenseek</h1>
        <div class="profile">
            <a href="{{ route('admin.profile.show') }}">
                <img src="{{ asset("storage/") . "/" . Auth()->user()->Photo }}" alt="Profile Image">
            </a>
        </div>
    </div>
    <ul class="sidebar-menu">
        <li class="">
            <a href="{{ route('admin.dashboard') }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">
                    <path d="M3 9l9-7 9 7"></path>
                    <path d="M9 22V12H15V22"></path>
                </svg>
                Dashboard
            </a>
        </li>
        <li>
            <a href="{{ route('admin.properties.index') }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-grid">
                    <rect x="3" y="3" width="7" height="7"></rect>
                    <rect x="14" y="3" width="7" height="7"></rect>
                    <rect x="14" y="14" width="7" height="7"></rect>
                    <rect x="3" y="14" width="7" height="7"></rect>
                </svg>
                Manage Properties
            </a>
        </li>
        <li>
            <a href="{{ route('admin.lessors.index') }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bar-chart-2">
                    <path d="M18 20V10"></path>
                    <path d="M12 20V4"></path>
                    <path d="M6 20V14"></path>
                </svg>
                Manage Lessors
            </a>
        </li>
        <li>
            <a href="{{ route('admin.users.index') }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-check">
                    <path d="M16 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                    <circle cx="12" cy="7" r="4"></circle>
                    <polyline points="16 11 18 13 22 9"></polyline>
                </svg>
                Manage Users
            </a>
        </li>
        <li>
            <a href="{{ route('bookings.index') }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar">
                    <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                    <line x1="16" y1="2" x2="16" y2="6"></line>
                    <line x1="8" y1="2" x2="8" y2="6"></line>
                    <line x1="3" y1="10" x2="21" y2="10"></line>
                </svg>
                Manage Bookings
            </a>
        </li>
        <li>
            <a href="{{ route('admin.properties.pending') }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-clipboard">
                    <path d="M19 4H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2z"></path>
                    <path d="M9 2h6v4H9z"></path>
                </svg>
                Requests
            </a>
        </li>
    </ul>
</div>
<Style>
    .sidebar-menu li {
    list-style: none;
    margin-bottom: 10px;
    position: relative;
}

.sidebar-menu li a {
    display: flex;
    align-items: center;
    padding: 10px;
    text-decoration: none;
    color: black;
    width: 100%;
    transition: background-color 0.3s;
}

.sidebar-menu li a:hover, .sidebar-menu li.active a {
    background-color: #f0d892;
    color: black;
}

.sidebar-menu li a svg {
    margin-right: 10px;
}

</Style>
