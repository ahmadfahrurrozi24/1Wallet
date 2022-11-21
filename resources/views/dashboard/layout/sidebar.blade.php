<div class="sidebar">
    <!-- Logo -->
    <div class="logo_content">
        <div class="logo">
            <img src="{{ asset('img/logo.png') }}" alt="" />
            <button class="hamburger-button">
                <i class="bx bx-menu sidebar-hamburger"></i>
            </button>
        </div>
    </div>
    <!-- Navbar -->
    <ul class="navList">
        <li>
            <a href="/dashboard">
                <i class="bx bxs-dashboard"></i>
                <span class="name">Dashboard</span>
            </a>
            <!-- <span class="tooltip">Dashboard</span> -->
        </li>
        <li>
            <a href="/dashboard/history">
                <i class="bx bx-history"></i>
                <span class="name">History</span>
            </a>
            <!-- <span class="tooltip">History</span> -->
        </li>
        <li>
            <a href="/dashboard/record/create">
                <i class="bx bx-wallet"></i>
                <span class="name">Add Record</span>
            </a>
        </li>
        <li>
            <a href="/dashboard/insight">
                <i class="bx bx-line-chart"></i>
                <span class="name">Insight</span>
            </a>
        </li>
        <hr />
        <li>
            <a href="/dashboard/profile">
                <i class="bx bx-user"></i>
                <span class="name">Profile</span>
            </a>
        </li>
        @if (auth()->user()->role->id == 1)
            <li>
                <a href="/dashboard/admin/category">
                    <i class='bx bxs-user-badge'></i>
                    <span class="name">Category</span>
                </a>
            </li>
        @endif
        <li>
            <form action="/logout" method="POST">
                @csrf
                <button type="submit">
                    <i class="bx bx-log-out-circle"></i>
                    <span class="name">Logout</span>
                </button>
            </form>
        </li>
    </ul>
</div>
