<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
                    <span><img alt="image" class="img-circle" src="{{url('assets/img/profile_small.jpg')}}" /></span>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="clear">
                            <span class="block m-t-xs">
                                <strong class="font-bold">{{ Auth::user()->name }}</strong>
                            </span>
                            <span class="text-muted text-xs block">Art Director <b class="caret"></b></span>
                        </span>
                    </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a href="#">{{ trans('labels.label.common.profile') }}</a></li>
                        <li class="divider"></li>
                        <li><a href="{{route('user.getLogout')}}">{{ trans('labels.label.common.logOut') }}</a></li>
                    </ul>
                </div>
                <div class="logo-element">
                    {{--{{trans('Labels.title.short.common')}}--}}
                </div>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-th-large"></i>
                    <span class="nav-label">User</span>
                    {{--<span class="fa arrow"></span>--}}
                </a>
            </li>
            <li>
                <a href="{{ route('company.getAllCompanies') }}">
                    <i class="fa fa-th-large"></i>
                    <span class="nav-label">Companies</span>
                    {{--<span class="fa arrow"></span>--}}
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-th-large"></i>
                    <span class="nav-label">QR code</span>
                    {{--<span class="fa arrow"></span>--}}
                </a>
            </li>
            <li>
                <a href="{{ route('ips.index') }}">
                    <i class="fa fa-th-large"></i>
                    <span class="nav-label">IP</span>
                    {{--<span class="fa arrow"></span>--}}
                </a>
            </li>
        </ul>

    </div>
</nav>