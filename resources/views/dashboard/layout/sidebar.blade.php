<div class="sidebar">
  <!-- Logo -->
  <div class="logo_content">
    <div class="logo">
      <img src="{{ asset("img/logo.png") }}" alt="" />
      <button class="hamburger-button">
        <i class="bx bx-menu sidebar-hamburger" ></i>
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
      <a href="/dashboard/newrecord">
        <i class="bx bx-wallet"></i>
        <span class="name">Add Record</span>
      </a>
    </li>
    <li>
      <a href="">
        <i class="bx bx-line-chart"></i>
        <span class="name">Insight</span>
      </a>
    </li>
    <hr />
    <li>
      <form action="">
        <button>
          <i class="bx bx-log-out-circle"></i>
          <span class="name">Logout</span>
        </button>
      </form>
    </li>
  </ul>
</div>
