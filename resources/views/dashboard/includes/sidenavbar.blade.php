<nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="{{Route('dashboard')}}">
              <i class="ti-shield menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tooltip" data-bs-title="Default tooltip" href="javascript:void(0);" style="cursor:context-menu;">
              <i class="ti-layout-list-post menu-icon"></i>
              <span class="menu-title">Staking &nbsp; <i class="ti-lock text-warning" style="font-weight:bold;"></i></span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{Route('withdraw')}}">
              <i class="ti-layout-list-post menu-icon"></i>
              <span class="menu-title">Withdraw</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{Route('transactions')}}">
              <i class="ti-layout-list-post menu-icon"></i>
              <span class="menu-title">Transactions</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{Route('renewals')}}">
              <i class="ti-layout-list-post menu-icon"></i>
              <span class="menu-title">Renewals</span>
            </a>
          </li>                      
          <li class="nav-item">
            <a class="nav-link" href="{{Route('profile')}}">
              <i class="ti-user menu-icon"></i>
              <span class="menu-title">Profile</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="chatify">
              <i class="ti-comment-alt menu-icon"></i>
              <span class="menu-title">Chat</span>
            </a>
          </li>
          <li class="nav-item">
          <button onclick="toggleTheme('dark');"  id="dark">Dark Mode <i class="fa fa-moon-o"></i></button>
          <button onclick="toggleTheme('light');" id="light">Light Mode <i class="fa fa-sun-o"></i></button>
          </li>
        </ul>
      </nav>