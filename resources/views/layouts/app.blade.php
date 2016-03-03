<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Dingo</title>

    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/jquery.toast.css') }}" rel="stylesheet">
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
                        <div class="alert alert-success">
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
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script>
        jQuery(document).ready(function($) {
            $('#save-change').on('click', function(event) {
                event.preventDefault();
                $("#create-new-board [data-dismiss='modal']").trigger('click');
                $.toast({
                    heading: 'Success',
                    text: 'And these were just the basic demos! Scroll down to check further details on how to customize the output.',
                    showHideTransition: 'slide',
                    icon: 'success'
                }); 
            });
        });
        jQuery(document).ready(function($) {
            $('.mega-dingo-dropdown').on('click', function (event) {
                $(this).parent().toggleClass('open');
            });
            $('body').on('click', function (e) {
                if (!$('.mega-dingo-dropdown').is(e.target) 
                    && $('.mega-dingo-dropdown').has(e.target).length === 0 
                    && $('.open').has(e.target).length === 0
                ) {
                console.log('ok');
                    $('.mega-dingo-dropdown').parent().removeClass('open');
                }
            });
        });
    </script>
</body>
</html>
