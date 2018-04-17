<section class="sidebar">
  <!-- Sidebar user panel -->
  <div class="user-panel" style="min-height: 60px">
    <div class="info">
      <p>{{ Auth::user()->name }}</p>
      <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
    </div>
  </div>
  <!-- /.search form -->
  <!-- sidebar menu: : style can be found in sidebar.less -->
  <ul class="sidebar-menu" data-widget="tree">
    <li class="header">MAIN NAVIGATION</li>
    <li class="active">
      <a href="{{ url('admin/home') }}">
        <i class="fa fa-dashboard"></i> <span>Dashboard</span>
      </a>
    </li>
    <li class="treeview">
      <a href="#">
        <i class="fa fa-users"></i>
        <span>Managers</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li><a href="{{ url('account/manager/create') }}"><i class="fa fa-circle-o"></i> Create Manager</a></li>
        <li><a href="{{ url('accounts/manager/all') }}"><i class="fa fa-circle-o"></i> Active Managers</a></li>
        <li><a href="{{ url('accounts/manager/suspended') }}"><i class="fa fa-circle-o"></i> Suspended accounts</a></li>
      </ul>
    </li>
    <li class="treeview">
      <a href="#">
        <i class="fa fa-users"></i>
        <span>Users</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        {{--<li><a href="{{ url('accounts/user/pending') }}"><i class="fa fa-circle-o"></i> Pending accounts</a></li>--}}
        <li><a href="{{ url('accounts/user/all') }}"><i class="fa fa-circle-o"></i> Active accounts</a></li>
        <li><a href="{{ url('accounts/user/suspended') }}"><i class="fa fa-circle-o"></i> Suspended accounts</a></li>
      </ul>
    </li>
    <li class="treeview">
      <a href="#">
        <i class="fa fa-files-o"></i>
        <span>Proposals</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li><a href="{{ url('proposals/all') }}"><i class="fa fa-circle-o"></i> Published</a></li>
        <li><a href="{{ url('proposals/top-votes') }}"><i class="fa fa-circle-o"></i> Top voted</a></li>
        <li><a href="{{ url('proposals/authorized/all') }}"><i class="fa fa-circle-o"></i> Authorized</a></li>
        <li><a href="{{ url('proposals/unpublished/all') }}"><i class="fa fa-circle-o"></i> Unpublished</a></li>
      </ul>
    </li>
  </ul>
</section>
