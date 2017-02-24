<div class="topbar">
    <!-- LOGO -->
    <div class="topbar-left">
        <div class="text-center">
            <a href="{{ url('/') }}" class="logo">
                <img src="{{ url('assets/images') }}/logo.svg" width="50px">
                <span>Admin Panel </span>
            </a>
        </div>
    </div>
    <!-- Button mobile view to collapse sidebar menu -->
    <div class="navbar navbar-default" role="navigation">
        <button type="button" class="button-menu-mobile open-left">
            <i class="fa fa-bars"></i>
        </button>
        <ul class="nav navbar-nav navbar-right pull-right">
            <li>
                <a href="#logout" onclick="$('#logout').submit();">
                    <span class="title">@lang('panel.logout')</span>
                    <i class="fa fa-arrow-right"></i>
                </a>
            </li>
      
        </ul>
    </div>
</div>