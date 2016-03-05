<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Dingo</title>

    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/jquery.toast.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dragula.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    @include('layouts.partials.modal')
    @include('layouts.partials.navigation')
    <div class="tm80">
        @if(Session::has('alert'))
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="alert alert-info">
                            <li class="list-unstyled">{{ Session::get('alert') }}</li>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        @yield('content')
    </div>    

    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/jquery.toast.js') }}"></script>  
    <script src="{{ asset('js/dragula.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/app.ajax.js') }}"></script>
</body>
</html>
