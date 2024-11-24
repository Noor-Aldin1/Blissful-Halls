<div class="header">
    <b>Admin Dashboard</b>
    <div class="header-right">


        <div class="dropdown">
            <button class="dropbtn">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                    <path d="M13.468 12.37C12.758 11.226 11.106 10 8 10s-4.758 1.226-5.468 2.37A7 7 0 1 1 13.468 12.37zM8 15a6.97 6.97 0 0 0 4.468-1.635C11.924 12.477 10.108 11.5 8 11.5s-3.924.977-4.468 1.865A6.97 6.97 0 0 0 8 15zm0-6.5a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"/>
                </svg>
                {{ auth()->user()->name }}
            </button>
            <div class="dropdown-content">
                <a href="{{ route('admin.profile.show') }}">Profile</a>
                <a href="{{ route('logout') }}"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </div>
    </div>
</div>

<style>
.header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px 20px;
    background-color: #f8f9fa;
    box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.1);
}

.header input[type="text"] {
    padding: 8px;
    border-radius: 5px;
    border: 1px solid #ced4da;
    width: 250px;
}

.header-right {
    display: flex;
    align-items: center;
}

.header-right span {
    margin-right: 20px;
}

.dropdown {
    position: relative;
    display: inline-block;
}

.dropbtn {
    background-color: #ffffff;
    border: none;
    cursor: pointer;
    font-size: 16px;
    display: flex;
    align-items: center;
}

.dropbtn svg {
    margin-right: 8px;
}

.dropdown-content {
    display: none;
    position: absolute;
    right: 0;
    background-color: #ffffff;
    min-width: 160px;
    box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.1);
    z-index: 1;
    border-radius: 5px;
}

.dropdown-content a {
    color: #333;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

.dropdown-content a:hover {
    background-color: #f1f1f1;
}

.dropdown:hover .dropdown-content {
    display: block;
}
</style>
