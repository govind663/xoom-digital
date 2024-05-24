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
                @elseif (Auth::user()->user_type == '2')
                @elseif (Auth::user()->user_type == '3')
                <li class="{{ ($currentRoute === 'task.index') || ($currentRoute === 'task.create') || ($currentRoute === 'task.edit') ? 'active' : '' }}">
                    <a href="{{ route('task.index') }}">
                        <i class="fe fe-pie-chart"></i>
                        <span>Manage Task</span>
                    </a>
                </li>
                @endif

                {{-- <li class="{{ ($currentRoute === 'parcel.index') || ($currentRoute === 'parcel.create') || ($currentRoute === 'parcel.edit') ? 'active' : '' }}">
                    <a href="{{ route('parcel.index') }}">
                        <i class="fe fe-pie-chart"></i>
                        <span>Manage Parcel</span>
                    </a>
                </li>

                <li class="{{ ($currentRoute === 'invoice.index') || ($currentRoute === 'invoice.create') || ($currentRoute === 'invoice.edit') ? 'active' : '' }}">
                    <a href="{{ route('invoice.index') }}">
                        <i class="fe fe-file-text"></i>
                        <span>Manage Invoice</span>
                    </a>
                </li> --}}

            </ul>
        </div>
    </div>
</div>
