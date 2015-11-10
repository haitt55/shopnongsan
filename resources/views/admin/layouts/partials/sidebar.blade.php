<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li>
                <a href="{{ route('admin.home.dashboard') }}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
            </li>
            <li>
                <a href="{{ route('admin.pages.index') }}"><i class="fa fa-file-o fa-fw"></i> Pages</a>
            </li>
            <li>
                <a href="{{ route('admin.articles.index') }}"><i class="fa fa-tag fa-fw"></i> Articles</a>
            </li>
            <li>
                <a href="{{ route('admin.contacts.index') }}"><i class="fa fa-envelope-o fa-fw"></i> Contacts</a>
            </li>
            <li>
                <a href="{{ route('admin.users.index') }}"><i class="fa fa-user fa-fw"></i> Users</a>
            </li>
            <li>
                <a href="#"><i class="fa fa-wrench fa-fw"></i> Settings<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ route('admin.settings.general') }}">General</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>
<!-- /.navbar-static-side -->