<!-- partial:partials/_sidebar.html -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">

      <li class="nav-item nav-category">Form List</li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('test_covids.index') }}">
          <i class="menu-icon mdi mdi-card-text-outline"></i>
          <span class="menu-title">Form Test Covid-19</span>
        </a>
      </li>
      <li class="nav-item nav-category">Master</li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
          <i class="menu-icon mdi mdi-floor-plan"></i>
          <span class="menu-title">Management User</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-basic">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{ route('users.index') }}">Users</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{ route('roles.index') }}">Role</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item nav-category">Statistic</li>
      <li class="nav-item">
        <a class="nav-link" href="{{ url('/home') }}">
          <i class="mdi mdi-grid-large menu-icon"></i>
          <span class="menu-title">Data Statistics</span>
        </a>
      </li>
      <li class="nav-item nav-category">help</li>
      <li class="nav-item">
        <a class="nav-link" href="#">
          <i class="menu-icon mdi mdi-file-document"></i>
          <span class="menu-title">Documentation</span>
        </a>
      </li>
    </ul>
  </nav>
