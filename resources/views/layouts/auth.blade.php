<!DOCTYPE html>
<html lang="en">
    <head>
        @include('partials.head')
    </head>

    <body class="page-header-fixed">

        <div style="margin-top: 5%;"></div>

            <div class="logo">
                <h1>
                    <img src="{{ url('assets/images') }}/logo.svg" alt="image description" onerror="this.onerror=null; this.src='images/logo.png'" height="144" width="175">
                </h1>
            </div>

        <div class="container-fluid">
            @yield('content')
        </div>

        <div class="scroll-to-top"
             style="display: none;">
            <i class="fa fa-arrow-up"></i>
        </div>

        @include('partials.javascripts')

    </body>
</html>