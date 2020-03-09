<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li>
                <a href="{{ route('dashboard') }}">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{ route('area.index') }}">
                    <i class="fa fa-suitcase"></i> <span>Area</span>
                </a>
            </li>
            <li>
                <a href="{{ route('device.index') }}">
                    <i class="fa fa-suitcase"></i> <span>Device</span>
                </a>
            </li>
            <li>
                <a href="{{ route('employee.index') }}">
                    <i class="fa fa-suitcase"></i> <span>Employee</span>
                </a>
            </li>
            <li>
                <a href="{{ route('transaction.index') }}">
                    <i class="fa fa-suitcase"></i> <span>Transaction</span>
                </a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
