<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul class="sidebar-vertical">

                <li class="{{ $currentRoute === 'home' ? 'active' : '' }}">
                    <a href="{{ route('home') }}">
                        <i class="fe fe-home"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                @if(Auth::user()->user_type == '1')
                <li class="{{ ($currentRoute === 'employee.index') || ($currentRoute === 'employee.create') || ($currentRoute === 'employee.edit') ? 'active' : '' }}">
                    <a href="{{ route('employee.index') }}">
                        <i class="fe fe-users"></i>
                        <span>Manage Employee</span>
                    </a>
                </li>

                <li class="{{ ($currentRoute === 'package-type.index') || ($currentRoute === 'package-type.create') || ($currentRoute === 'package-type.edit') ? 'active' : '' }}">
                    <a href="{{ route('package-type.index') }}">
                        <i class="fe fe-grid"></i>
                        <span>Package Type</span>
                    </a>
                </li>

                <li class="{{ ($currentRoute === 'package.index') || ($currentRoute === 'package.create') || ($currentRoute === 'package.edit') ? 'active' : '' }}">
                    <a href="{{ route('package.index') }}">
                        <i class="fe fe-settings"></i>
                        <span>Manage Package</span>
                    </a>
                </li>

                <li class="{{ ($currentRoute === 'discount.index') || ($currentRoute === 'discount.create') || ($currentRoute === 'discount.edit') ? 'active' : '' }}">
                    <a href="{{ route('discount.index') }}">
                        <i class="fe fe-shopping-bag"></i>
                        <span>Manage Discount</span>
                    </a>
                </li>

                <li class="{{ ($currentRoute === 'leads.index') ? 'active' : '' }}">
                    <a href="{{ route('leads.index') }}">
                        <i class="fe fe-pie-chart"></i>
                        <span>Manage leads</span>
                    </a>
                </li>

                <li class="{{ ($currentRoute === 'customer.index') ? 'active' : '' }}">
                    <a href="{{ route('customer.index') }}">
                        <i class="fe fe-pie-chart"></i>
                        <span>Manage Customers</span>
                    </a>
                </li>
                @elseif (Auth::user()->user_type == '2')
                @elseif (Auth::user()->user_type == '3')
                <li class="{{ ($currentRoute === 'task.index') || ($currentRoute === 'task.create') || ($currentRoute === 'task.edit') ? 'active' : '' }}">
                    <a href="{{ route('task.index') }}">
                        <i class="fe fe-pie-chart"></i>
                        <span>Manage Task</span>
                    </a>
                </li>

                <li class="submenu">
                    <a href="javascript:void(0);">
                        <i class="fe fe-box"></i>
                        <span>Reports</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul style="display: none;">
                        <li class="{{ ($currentRoute === 'sales-report-list.index/1') ? 'active' : '' }}">
                            <a href="{{ route('sales-report-list.index', ['task_status'=>1]) }}"><span>Pending</span></a>
                        </li>
                        <li class="{{ ($currentRoute === 'sales-report-list.index/2') ? 'active' : '' }}">
                            <a href="{{ route('sales-report-list.index', ['task_status'=>2]) }}"><span>In Progress</span></a>
                        </li>
                        <li class="{{ ($currentRoute === 'sales-report-list.index/3') ? 'active' : '' }}">
                            <a href="{{ route('sales-report-list.index', ['task_status'=>3]) }}"><span>Completed</span></a>
                        </li>
                        <li class="{{ ($currentRoute === 'sales-report-list.index/4') ? 'active' : '' }}">
                            <a href="{{ route('sales-report-list.index', ['task_status'=>4]) }}"><span>Cancelled</span></a>
                        </li>
                    </ul>
                </li>
                @endif

            </ul>
        </div>
    </div>
</div>
