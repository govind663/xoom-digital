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

                {{-- Admin Rights --}}
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

                <li class="{{ ($currentRoute === 'task.index') || ($currentRoute === 'task.create') || ($currentRoute === 'task.edit') ? 'active' : '' }}">
                    <a href="{{ route('task.index') }}">
                        <i class="fe fe-pie-chart"></i>
                        <span>Manage Task</span>
                    </a>
                </li>

                {{-- Markiting Executive Rights --}}
                @elseif (Auth::user()->user_type == '2')
                <li class="{{ ($currentRoute === 'task.index') || ($currentRoute === 'task.create') || ($currentRoute === 'task.edit') ? 'active' : '' }}">
                    <a href="{{ route('task.index') }}">
                        <i class="fe fe-pie-chart"></i>
                        <span>Manage Task</span>
                    </a>
                </li>

                {{-- Telesales Right --}}
                @elseif (Auth::user()->user_type == '3')
                <li class="{{ ($currentRoute === 'task.index') || ($currentRoute === 'task.create') || ($currentRoute === 'task.edit') ? 'active' : '' }}">
                    <a href="{{ route('task.index') }}">
                        <i class="fe fe-pie-chart"></i>
                        <span>Manage Task</span>
                    </a>
                </li>
                @endif

                <li class="submenu {{ ($currentRoute === 'sales-report-list.index') ? 'no-active' : '' }}">
                    <a href="javascript:void(0);">
                        <i class="fe fe-box"></i>
                        <span>Reports</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul style="display: none;">
                        <li class="">
                            <a href="{{ route('sales-report-list.index', ['task_status'=>'01']) }}"><span>Meating</span></a>
                        </li>
                        <li class="">
                            <a href="{{ route('sales-report-list.index', ['task_status'=>'02']) }}"><span>Follow Up</span></a>
                        </li>
                        <li class="">
                            <a href="{{ route('sales-report-list.index', ['task_status'=>'03']) }}"><span>Deal Closed</span></a>
                        </li>
                        <li class="">
                            <a href="{{ route('sales-report-list.index', ['task_status'=>'04']) }}"><span>Not Interested</span></a>
                        </li>
                    </ul>
                </li>

            </ul>
        </div>
    </div>
</div>
