<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Wiser Capital | {{ $page_title or "Page Title" }}</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- Bootstrap 3.3.4 -->
        <link href="{{ asset("/bower_components/admin-lte/bootstrap/css/bootstrap.min.css") }}" rel="stylesheet" type="text/css" />
        <!-- Font Awesome Icons 4.4.0 -->
        <link href="{{ asset("/bower_components/admin-lte/font-awesome/css/font-awesome.min.css") }}" rel="stylesheet" type="text/css" />
        <!-- Ionicons 2.0.1 -->
        <link href="{{ asset("/bower_components/admin-lte/ionicons/css/ionicons.min.css") }}" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="{{ asset("/bower_components/admin-lte/dist/css/AdminLTE.css") }}" rel="stylesheet" type="text/css" />
        <!-- iCheck -->
        <link href="{{ asset("/bower_components/admin-lte/plugins/iCheck/square/blue.css") }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset(('/assets/themes/wisercapital/css/styles.css')) }}" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body  >

        <div class="box-body">
            @include('flash::message')
            @include('partials._errors')
        </div>
        <div class="container">
            <div class="login-box">
                <div class="login-wrapper">
                    <div class="login-logo">
                        <img src="/assets/themes/wisercapital/img/Wiser-Capital-logo.png" width="264" />
                    </div><!-- /.login-logo -->
                    <div class="login-box-body">

                        <!-- Your Page Content Here -->
                        @yield('content')

                    </div><!-- /.login-box-body -->
                </div><!-- /.login-box-body -->
            </div><!-- /.login-box -->
        </div>
        <!-- jQuery 2.1.4 -->
        <meta name="_token" content="{!! csrf_token() !!}" />
        <script src="{{ asset("/bower_components/admin-lte/plugins/jQuery/jQuery-2.1.4.min.js") }}"></script>
        <!-- Bootstrap 3.3.2 JS -->
        <script src="{{ asset("/bower_components/admin-lte/bootstrap/js/bootstrap.min.js") }}" type="text/javascript"></script>
        <!-- iCheck -->
        <script src="{{ asset("/bower_components/admin-lte/plugins/iCheck/icheck.min.js") }}" type="text/javascript"></script>
        <script>
            
            
        var csrfField = $('[name="_token"]');
        var csrfToken = $('[name="_token"]').val() ? $('[name="_token"]').val() : "{{csrf_token()}}";
        
        function refreshToken(){
            $.get("{{url('/refresh-csrf?checkLoginStatus=true')}}").done(function(data){
                csrfToken = data;
                $('[name="_token"]').val(data); // the new token
            });
        }

        setInterval(refreshToken, 120000); 

$(function () {
    $('input').iCheck({
        checkboxClass: 'icheckbox_square-blue',
        radioClass: 'iradio_square-blue',
        increaseArea: '20%' // optional
    });
});
function terms() {
    if ($('#role').val()) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        })
        $.ajax({
            url: '/auth/register/terms',
            type: 'POST',
            data: {'value': $('#role').val()},
            success: function (data) {
                $('#modal-body').html(data);
                $('#termsModal').modal('show');
            }
        });
    } else {
        alert('Plaese select a role');
    }
}
        </script>
    </body>
</html>
