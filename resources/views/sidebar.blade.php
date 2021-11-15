<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset('/vendor/adminlte/dist/img/avatar.png') }}" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
                <p>{{ Auth::user()->name }}</p>
                <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form (Optional) -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
                <span class="input-group-btn">
                  <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">HEADER</li>
            <!-- Optionally, you can add icons to the links -->
            <li class="active"><a href="#"><span>Link</span></a></li>
            <li><a href="{{ route('home')}}"><span><i class="fa fa-home" aria-hidden="true"></i> Goto Home</span></a></li>
            @if ( Session::get('role') == "Admin")

            <li class="treeview">
                <a href="#"><i class="fa fa-bars" aria-hidden="true"></i><span>Trainings</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('show-upload')}}"><i class="fa fa-paper-plane" aria-hidden="true"></i> Upload Training</a></li>
                    <li><a href="{{ route('show-project-list')}}"><i class="fa fa-bars" aria-hidden="true"></i> View Training</a></li>
                </ul>
            </li>
                <li class="treeview">
                    <a href="#"><span><i class="fa fa-money" aria-hidden="true"></i> Transactions</span> <i class="fa fa-angle-left pull-right"></i></a>
                    <ul class="treeview-menu">
                        <li><a href="{{ route('show-all')}}"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> All</a></li>
                        <li><a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> Successful</a></li>
                        <li><a href="#"><i class="fa fa-question" aria-hidden="true"></i> Pending</a></li>
                        <li><a href="#"><i class="fa fa-times" aria-hidden="true"></i> Unsuccessful</a></li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#"><span><i class="glyphicon glyphicon-user" aria-hidden="true"></i> Student</span> <i class="fa fa-angle-left pull-right"></i></a>
                    <ul class="treeview-menu">
                        <li><a href="{{ route('show-all-students')}}"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> All Trainiee</a></li>
                        <li><a href="{{ route('enter-question') }}"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> Get Student</a></li>
                        <li><a href="#"><i class="fa fa-question" aria-hidden="true"></i> View Response</a></li>
                        <li><a href="#"><i class="fa fa-times" aria-hidden="true"></i> Unsuccessful</a></li>
                    </ul>
                </li>
            @elseif(session('transactStatus') == "success")
                <li class="treeview">
                    <a href="#"><span><i class="fa fa-money" aria-hidden="true"></i> Applications</span> <i class="fa fa-angle-left pull-right"></i></a>
                    <ul class="treeview-menu">
                        <!-- <li><a href="{{ route('fill-form')}}"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> transactions</a></li> -->
                        <li><a href="{{ route('payments')}}"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> transactions</a></li>
                        <li><a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> View Applications</a></li>
                        <!-- <li><a href="#"><i class="fa fa-question" aria-hidden="true"></i> Pending</a></li>
                        <li><a href="#"><i class="fa fa-times" aria-hidden="true"></i> Unsuccessful</a></li> -->
                    </ul>
                </li>
                
            @endif
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>