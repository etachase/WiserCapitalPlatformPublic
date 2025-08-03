<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="skin-blue layout-top-nav">

    <!-- Main body content -->
    @include('partials._body_content')


    <!-- Footer -->
    @include('partials._footer')

    <!-- Optional bottom section for modals etc... -->
    @yield('body_bottom')

    <!-- Body Bottom modal dialog-->
    <div class="modal fade" id="modal_dialog" tabindex="-1" role="dialog" aria-labelledby="modal_dialog_title" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            </div>
        </div>
    </div>
    <!-- Masking of input fields -->
    <script src="{{ url('/js/mask.js') }}"></script>
    <script src="{{ url('/js/maskMoney.js') }}"></script>
    <script src="{{ url('/js/pinterest_grid.js') }}"></script>

    <!-- Application JS-->
    <script src="{{ asset(elixir('js/all.js')) }}"></script>
    <script>
        $(document).ready(function () {    
            $('.button_panel_message').on('click', function() {
                $('#' + $(this).data('target')).remove();
            });
            
            $('.priceFormatter2, .priceFormatter').each(function() {
                $(this).val() ? $(this).maskMoney('mask') : '';
            });
        });
    </script>
    <?php if (Auth::check()) : ?>
    <div id="logout-bar" style="display:none; padding: 10px 0 0 0px;">
        <span id="logout-bar-in">
            Inactive Use -> Logout in <span id="logout-bar-time">60</span> seconds. To stay logged in, Please click <input type="button" id="logout-bar-button" class="btn btn-sm btn-primary btn-rounded" value="OK" />
        </span>
        <span id="logout-bar-out" style="display:none; padding-top: 10px">
            {{trans('general.error.session-timeout')}}
        </span>
    </div>
    <script type="text/javascript">
        var defaultExpireTime;
        var runExpireCounter;
        var logoutCounter;
        var startTimerTimeout;
        var checkStatusTimeout;    
        
        
        var csrfField = $('[name="_token"]');
        var csrfToken = $('[name="_token"]').val() ? $('[name="_token"]').val() : "{{csrf_token()}}";
        
        function updateCsrfToken(data){
            csrfToken = data;
            $('[name="_token"]').val(data); // the new token
        }
        
        /**
         * 
         * To show Login Bar
         */
        function checkLoginStatus() {
            $.ajax({
                url: "{{url('/check-login-status')}}",
                dataType: 'json',
                data : {
                    '_token' : csrfToken,
                    'checkLoginStatus' : true,
                },
                type: 'post',
                success: function (data) {
                    if(data && data.success) {
                        if (data.time > 60) {
                            (data.time > 120) ? updateCsrfToken(data.newToken) : '';
                            checkStatusTimeout = setTimeout(checkLoginStatus, (data.time < 75) ? 2000 : ((data.time < 120) ? 10000 : 60000));
                        } else {
                            logoutCounter = data.time + 1;
                            runExpireCounter = true;
                            startLogoutCounter();
                            $('#logout-bar').show();
                        }
                    } else {
                       setLoggedOut();
                    }
                }, 
                error : function (data) {
                    setTimeout(checkLoginStatus, 30000);
                }
            });
        }

        /**
         * To Show login Counter in BAR
         */
        function startLogoutCounter() {
            if(runExpireCounter) {
                logoutCounter -= 1;
                $('#logout-bar-time').html(logoutCounter);
                if(logoutCounter < 0) {
                    setLoggedOut(true);
                } else {
                    startTimerTimeout = setTimeout(startLogoutCounter, 1000);
                    if(!(logoutCounter % 2)) {
                        $.ajax({
                            url: "{{url('/check-login-status')}}",
                            dataType: 'json',
                            data : {
                                '_token' : csrfToken,
                                'checkLoginStatus' : true,
                            },
                            type: 'post',
                            success: function (data) {
                                logoutCounter = data.time;
                                if(data && data.success && data.time && (data.time > 0)) {
                                    data.time > 60 ? resetLoginStatus() : '';
                                } else {
                                    setLoggedOut(true);
                                }
                            }
                        });
                    }
                }
            }
        }

        /*
        * Refresh Login to Start
        */
        function resetLoginStatus() {
            defaultExpireTime = 60;
            runExpireCounter = false;
            logoutCounter = 60;
            $('#logout-bar').hide();
            clearTimeout(startTimerTimeout);
            clearTimeout(checkStatusTimeout);
            checkLoginStatus();
        }

        resetLoginStatus();

        /**
        * User Is Logged Out
        */
        function setLoggedOut(userLoggedOut) {
            if (userLoggedOut) {
                window.location.replace("{{url('/auth/login')}}");
                return;
            }
            $('#logout-bar-in').hide();
            $('#logout-bar-out').show();
            $.ajax({
                url: "{{url('/auth/logout')}}",
                data : {
                    '_token' : csrfToken,
                },
                dataType: 'json',
                type: 'post',
                success: function (data) {
                    window.location.replace("{{url('/auth/login')}}");
                }, 
                error: function () {
                    setLoggedOut();
                }
            })
        }
        
        function updateLoginStatus() {
            $.ajax({
                url: "{{url('/check-login-status')}}",
                dataType: 'json',
                data : {
                    '_token' : csrfToken,
                },
                type: 'post',
                success: function (data) {
                    if(data && data.success) {
                        resetLoginStatus();
                    } else {
                        setLoggedOut();
                    }
                }
            });
        }

        /**
        * Login button Event
        */
        $('#logout-bar-button').click(updateLoginStatus);

    </script>
    <?php endif; ?>
</body>
