@inject('request', 'Illuminate\Http\Request')
<div class="left side-menu navbar-collapse">
    <div >
        <div class="sidebar-inner slimscrollleft" style="overflow: hidden; width: auto; height: 592px;">
            <!--- Divider -->
            <div id="sidebar-menu">
                <ul>
                    <li class="{{ $request->segment(1) == 'home' ? 'active' : '' }}">
                        <a href="{{ url('/') }}">
                            <i class="fa fa-wrench"></i>
                            <span class="title">@lang('panel.home')</span>
                        </a>
                    </li>
                    @can('user_management_access')
                    <li class="has_sub">
                        <a href="#" class="waves-effect">
                            <i class="fa fa-users"></i>
                            <span class="title">@lang('panel.user-management.title')</span>
                            <i class="fa arrow"></i>
                        </a>
                        <ul class="list-unstyled">

                            @can('role_access')
                            <li class="{{ $request->segment(1) == 'roles' ? 'active active-sub' : '' }}">
                                <a href="{{ route('roles.index') }}">
                                    <i class="fa fa-briefcase"></i>
                                    <span class="title">
                                        @lang('panel.roles.title')
                                    </span>
                                </a>
                            </li>
                            @endcan
                            @can('user_access')
                            <li class="{{ $request->segment(1) == 'users' ? 'active active-sub' : '' }}">
                                <a href="{{ route('users.index') }}">
                                    <i class="fa fa-user"></i>
                                    <span class="title">
                                        @lang('panel.users.title')
                                    </span>
                                </a>
                            </li>
                            @endcan
                        </ul>
                    </li>
                    <li class="has_sub">
                        <a href="#">
                            <i class="fa  fa-newspaper-o"></i>
                            <span class="title">@lang('panel.article-management.title')</span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="list-unstyled">

                            @can('template_access')
                            <li class="{{ $request->segment(1) == 'templates' ? 'active active-sub' : '' }}">
                                <a href="{{ route('templates.index') }}">
                                    <i class="fa fa-file-code-o"></i>
                                    <span class="title">
                                        @lang('panel.templates.title')
                                    </span>
                                </a>
                            </li>
                            <li class="{{ $request->segment(1) == 'groups' ? 'active active-sub' : '' }}">
                                <a href="{{ route('groups.index') }}">
                                    <i class="fa fa-folder"></i>
                                    <span class="title">
                                        @lang('panel.groups.title')
                                    </span>
                                </a>
                            </li>
                            <li class="{{ $request->segment(1) == 'news' ? 'active active-sub' : '' }}">
                                <a href="{{ route('news.index') }}">
                                    <i class="fa fa-file-text"></i>
                                    <span class="title">
                                        @lang('panel.articles.title')
                                    </span>
                                </a>
                            </li>
                            @endcan
                        </ul>
                    </li>
                    @endcan

                    <li>
                        <a href="#logout" onclick="$('#logout').submit();">
                            <i class="fa fa-arrow-left"></i>
                            <span class="title">@lang('panel.logout')</span>
                        </a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>