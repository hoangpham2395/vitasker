<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="{{ asset('images/no-image.png') }}" class="img-circle" alt="">
      </div>
      <div class="pull-left info">
        <p>{{ Auth::user()->username }}</p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>

    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu">
      <li>
        <a href="{{ asset('dashboard') }}">
          <i class="fa fa-dashboard"></i> <span>Dashboard</span>
        </a>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-users"></i> <span>Users</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ asset('users') }}"><i class="fa fa-th-list"></i> List of Users</a></li>
          <li><a href="#"><i class="fa fa-plus"></i> Add new user</a></li>
        </ul>
      </li>
      <li>
        <a href="{{ asset('favourites') }}">
          <i class="fa fa-thumbs-up"></i> <span>Favourites</span>
        </a>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-suitcase"></i> <span>Jobs</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ asset('jobs') }}"><i class="fa fa-th-list"></i> List of Jobs</a></li>
          <li><a href="{{ asset('jobs/create') }}"><i class="fa fa-plus"></i> Add new job</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-align-center"></i> <span>Categories</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ asset('categories') }}"><i class="fa fa-th-list"></i> List of Categories</a></li>
          <li><a href="{{ asset('categories/create') }}"><i class="fa fa-plus"></i> Add new category</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-comment"></i> <span>Fboders</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ asset('fboders') }}"><i class="fa fa-th-list"></i> List of Fboders</a></li>
          <li><a href="{{ asset('fboders/create') }}"><i class="fa fa-plus"></i> Add new fboder</a></li>
        </ul>
      </li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>