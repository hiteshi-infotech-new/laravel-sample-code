<aside class="left-side sidebar-offcanvas">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                @if( Auth::user()->profile)
                <img src="{{ asset('/storage/images/'.Auth::user()->profile) }}" class="img-circle" alt="User Image" />
                @else
                <img src="{{ asset('/storage/images/user.png') }}" class="img-circle" alt="User Image" />
                @endif
            </div>
            <div class="pull-left info">
                <p>{{ ucfirst(trans(Auth::user()->name))}}</p>
            </div>
        </div>

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="active">
                <a href="{{route('admin.dashboard')}}">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>
           
            <li class="treeview">
                <a href="{{url('Category')}}">
                    <i class="fa fa-th"></i>
                    <span>Category Master</span>
                   
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{url('Category')}}"><i class="fa fa-angle-double-right"></i> Add New</a></li>
                    <li><a href="pages/charts/flot.html"><i class="fa fa-angle-double-right"></i> View List</a></li>
                </ul>
            </li>

            <li class="">
                <a href="{{url('brand-list')}}">
                    <i class="fa fa-btc"></i> <span>Brand Master</span>
                </a>
            </li>

            <li class="">
                <a href="{{url('product-list')}}">
                    <i class="fa fa-shopping-cart"></i> <span>Product Master</span>
                </a>
            </li>            

            <li class="">
                <a href="{{route('admin.profile')}}">
                    <i class="fa fa-user"></i> <span>My Profile</span>
                </a>
            </li>

            <li class="">
                <a href="{{ route('admin.logout') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                    <i class="fa fa-sign-out"></i> <span>Logout</span>
                </a>
            </li>

            <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                @csrf
            </form>           
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>