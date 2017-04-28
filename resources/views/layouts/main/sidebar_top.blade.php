<nav class="navbar navbar-static-top" role="navigation">
    <div class="navbar-header">
        <div class="navbar-header">
            <button aria-controls="navbar" aria-expanded="false" data-target="#navbar" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
                <i class="fa fa-reorder"></i>
            </button>
            <a href="#" class="navbar-brand">{{ trans('messages.label.common.home') }}</a>
        </div>
    </div>
    <div class="navbar-collapse collapse" id="navbar">
        <ul class="nav navbar-nav">
            {{--<li class="dropdown">--}}
                {{--<a aria-expanded="false" role="button" href="#" class="dropdown-toggle" data-toggle="dropdown">--}}
                    {{--{{trans('messages.menu.managerUser')}} <span class="caret"></span>--}}
                {{--</a>--}}
                {{--<ul role="menu" class="dropdown-menu">--}}
                    {{--<li><a href="">{{trans('messages.menu.createAccount')}}</a></li>--}}
                    {{--<li><a href="">{{trans('messages.menu.editAccount')}}</a></li>--}}
                    {{--<li><a href="">{{trans('messages.menu.createCompany')}}</a></li>--}}
                    {{--<li><a href="">{{trans('messages.menu.deleteProject')}}</a></li>--}}
                {{--</ul>--}}
            {{--</li>--}}
            {{--<li class="dropdown">--}}
                {{--<a aria-expanded="false" role="button" href="#" class="dropdown-toggle" data-toggle="dropdown">--}}
                    {{--{{trans('messages.menu.managerProject')}} <span class="caret"></span>--}}
                {{--</a>--}}
                {{--<ul role="menu" class="dropdown-menu">--}}
                    {{--<li><a href="">{{trans('messages.menu.createProject')}}</a></li>--}}
                    {{--<li><a href="">{{trans('messages.menu.editProject')}}</a></li>--}}
                {{--</ul>--}}
            {{--</li>--}}
            {{--<li class="dropdown">--}}
                {{--<a aria-expanded="false" role="button" href="#" class="dropdown-toggle" data-toggle="dropdown">--}}
                    {{--{{trans('messages.menu.listProject')}} <span class="caret"></span>--}}
                {{--</a>--}}
                {{--<ul role="menu" class="dropdown-menu">--}}
                    {{--<li><a href="">{{trans('messages.menu.resultProject')}}</a></li>--}}
                    {{--<li><a href="">{{trans('messages.menu.chooseProject')}}</a></li>--}}
                    {{--<li><a href="">{{trans('messages.menu.detailProject')}}</a></li>--}}
                {{--</ul>--}}
            {{--</li>--}}
            <li class="dropdown {{ menu_active(route('project.chosingProject')) }}">
                <a aria-expanded="false" role="button" href="{{ route('project.chosingProject') }}" class="dropdown-toggle" >
                    {{trans('messages.menu.chooseProject')}}
                </a>
            </li>
            <li class="dropdown {{ menu_active(route('report.index')) }}">
                <a aria-expanded="false" role="button" href="{{ route('report.index') }}" class="dropdown-toggle" >
                    {{trans('messages.menu.report')}}
                </a>
            </li>
            <li class="dropdown {{ menu_active(route('project.projectList')) }}">
                <a aria-expanded="false" role="button" href="{{ route('project.projectList') }}" class="dropdown-toggle" >
                    {{trans('messages.menu.listProject')}}
                </a>
            </li>
            <li class="dropdown {{ menu_active(route('project.getMenu')) }}">
                <a aria-expanded="false" role="button" href="{{ route('project.getMenu') }}" class="dropdown-toggle" >
                    {{trans('messages.menu.managerProject')}}
                </a>
            </li>
            <li class="dropdown {{ menu_active(route('admin.home')) }}">
                <a aria-expanded="false" role="button" href="{{ route('admin.home') }}" class="dropdown-toggle" >
                    {{trans('messages.menu.managerUser')}}
                </a>
            </li>

        </ul>
        <ul class="nav navbar-top-links navbar-right">
            <li>
                <a href="{{route('user.getLogin')}}">
                    <i class="fa fa-sign-out"></i> {{ trans('messages.label.common.logOut') }}
                </a>
            </li>
        </ul>
    </div>
</nav>