<!DOCTYPE html>
<html lang="en">

    <head>
        @include('partials.head')

    </head>

    <body class="widescreen fixed-left">
        <div id="wrapper">
            @include('partials.header')
            @include('partials.sidebar')
            <div class="content-page">

                @if(isset($siteTitle))
                <h3 class="page-title">
                    {{ $siteTitle }}
                </h3>
                @endif
                @if (Session::has('message'))
                <div class="note note-info">
                    <p>{{ Session::get('message') }}</p>
                </div>
                @endif
                @if ($errors->count() > 0)
                <div class="note note-danger">
                    <ul class="list-unstyled">
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <div class="content">
                    @yield('content')
                </div>
            </div>
        </div>

        <div class="scroll-to-top"
             style="display: none;">
            <i class="fa fa-arrow-up"></i>
        </div>

        {!! Form::open(['route' => 'auth.logout', 'style' => 'display:none;', 'id' => 'logout']) !!}
        <button type="submit">Logout</button>
        {!! Form::close() !!}

    </body>
            @include('partials.javascripts')
</html>