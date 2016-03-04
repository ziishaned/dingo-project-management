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
                    $('.mega-dingo-dropdown').parent().removeClass('open');
                }
            });
        });
        window.onload = function() {
            dragula([document.getElementById('left1'), document.getElementById('right1')]);
        }
        jQuery(document).ready(function($) {
            var ancherToAddInput = $('#show-input-field');
            var appendInput = '<form action="" method="POST" role="form" id="form-to-add-list"> <div class="form-group" style="margin-bottom: 8px;"> <input type="text" class="form-control" id="" placeholder="Input field"> </div> <div class="form-group" style="margin-bottom: 0px;"> <button type="submit" class="btn btn-primary">Save</button> <span class="glyphicon glyphicon-remove close-input-add-list" aria-hidden="true"></span> </div> </form>';
            $('#show-input-field').click(function(){
                $(this).hide();
                $(this).closest('.panel-body').append(appendInput);
                $('.close-input-add-list').on('click', function() { 
                    $('#form-to-add-list').hide();
                    $(this).closest('.panel-body').prepend(ancherToAddInput);
                });
            });
        });

        // Ajax Requests
        jQuery(document).ready(function($) {
            $('#save-board').on('click', function(event) {
                event.preventDefault();
                var boardTitle = $('#boardTitle').val();
                var boardPrivacyType = $('#boardPrivacyType').val();

                $.ajax({
                    url: 'postBoard',
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        boardTitle: boardTitle,
                        boardPrivacyType: boardPrivacyType 
                    },
                    success: function (data) {
                        console.table(data);
                    }
                });
                
            });
        });
    </script>
</body>
</html>
