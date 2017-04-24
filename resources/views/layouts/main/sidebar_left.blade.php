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
                        <li><a href="#">{{ trans('messages.label.common.profile') }}</a></li>
                        <li class="divider"></li>
                        <li><a href="{{route('user.getLogin')}}">{{ trans('messages.label.common.logOut') }}</a></li>
                    </ul>
                </div>
                <div class="logo-element">
                    {{trans('messages.title.short.common')}}
                </div>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-th-large"></i>
                    <span class="nav-label">{{trans('messages.menu.managerUser')}}</span>
                    <span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="#">{{trans('messages.menu.createAccount')}}</a></li>
                    <li><a href="#">{{trans('messages.menu.editAccount')}}</a></li>
                    <li><a href="#">{{trans('messages.menu.createCompany')}}</a></li>
                    <li><a href="#">{{trans('messages.menu.deleteProject')}}</a></li>
                </ul>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-th-large"></i>
                    <span class="nav-label">{{trans('messages.menu.managerProject')}}</span>
                    <span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="#">{{trans('messages.menu.createProject')}}</a></li>
                    <li><a href="#">{{trans('messages.menu.editProject')}}</a></li>
                </ul>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-th-large"></i>
                    <span class="nav-label">{{trans('messages.menu.listProject')}}</span>
                    <span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="#">{{trans('messages.menu.resultProject')}}</a></li>
                    <li><a href="#">{{trans('messages.menu.chooseProject')}}</a></li>
                    <li><a href="#">{{trans('messages.menu.detailProject')}}</a></li>
                </ul>
            </li>
            <li class="active">
                <a href="layouts.html"><i class="fa fa-diamond"></i>
                    <span class="nav-label">
                        {{trans('messages.menu.report')}}
                    </span>
                </a>
            </li>
        </ul>

    </div>
</nav>