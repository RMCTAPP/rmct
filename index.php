<?php include '../shared/configuration.php'; ?>

<!doctype html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="theme-color" content="#000000">
    <title><?=$app_name; ?></title>
    <meta name="description" content="">
    <meta name="keywords" content="" />

    <?php include 'partials/styles.php'; ?>
    <style type="text/css">
        .form-group .input-wrapper.active .label {
          color: #daeaff !important;
        }
        span.error {
          font-size: 12px;
          margin: 10px 0;
          padding: 2px 10px;
          background: #fff;
          border-top: 2px solid #FF3939;
          color: #333;
        }
    </style>
</head>
<body class="bg-primary">

    <?php include 'partials/loader.php'; ?>

    <div id="appCapsule">
        <div class="section">
            <div class="text-center mt-5 mb-4">
                <img src="../shared/media/logo-no-bg.png" alt="image" class="imaged w-25">
            </div>
            <div class="row mx-3 mt-2">
                <h2 class="text-light">Welcome</h2>
                <h4 class="text-light mb-4">Sign in to continue</h4>
                <form id="login-form">
                    <div class="form-group boxed">
                        <div class="input-wrapper">
                            <label class="label text-light" for="username">Email</label>
                            <input type="text" class="form-control" id="username" name="username" placeholder="Enter email">
                        </div>
                    </div>

                    <div class="form-group boxed">
                        <div class="input-wrapper">
                            <label class="label text-light" for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" autocomplete="off"placeholder="Enter password">
                            
                        </div>
                    </div>

                    <button type="submit" id="login-submit" class="btn bg-white btn-text-primary btn-lg btn-block mt-3">Log in</button>

                    <p class="text-center mt-2 mb-2">Don't have an account yet?</p>

                    <a href="account-register.php" class="btn btn-outline-light btn-lg btn-block">Create Account</a>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade action-sheet" id="notif-success" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="action-sheet-content">
                        <div class="iconbox text-success">
                            <ion-icon name="checkmark-circle"></ion-icon>
                        </div>
                        <div class="text-center p-2">
                            <h3 id="success-title">Success</h3>
                            <p id="success-message" style="color: #333;"></p>
                        </div>
                        <a href="#" class="btn btn-primary btn-lg btn-block" data-bs-dismiss="modal">Close</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade action-sheet" id="notif-error" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="action-sheet-content">
                        <div class="iconbox text-danger">
                            <ion-icon name="alert-circle"></ion-icon>
                        </div>
                        <div class="text-center p-2">
                            <h3 id="error-title">Error</h3>
                            <p id="error-message" style="color: #333;"></p>
                        </div>
                        <a href="#" class="btn btn-primary btn-lg btn-block" data-bs-dismiss="modal">Close</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include 'partials/scripts.php'; ?>

    <script type="text/javascript">
        $(function () {
            $("#login-form").validate({
                errorElement: "span",
                errorPlacement: function(error, element) {
                    error.insertAfter(element.parent());
                },
                rules: {
                    username: {
                        required: true
                    },
                    password: {
                        required: true
                    }
                },
                messages: {
                    username: {
                        required: "Enter email"
                    },
                    password: {
                        required: "Enter password"
                    }
                },
                submitHandler: function(form) {
                    var button = $('#login-submit'); 
                    $.ajax({
                        url: "account-login-ajax.php",
                        method: "POST",
                        dataType: 'json',
                        data: $(form).serialize(),
                        beforeSend: function(){
                            button.attr('disabled', true);
                        },
                        complete: function(){
                            button.attr('disabled', false);
                        },
                        success: function(response) {

                            if (response.status == 'error') {
                                $('p#error-message').text(response.message);
                                $('div#notif-error').modal('show');
                            }

                            if (response.status == 'success') {
                                appJsInterface.createSession(JSON.stringify(response.data), "login");
                            }
                        },
                        error: function(error) {
                            console.info(error.statusText);
                        }
                    });
                }
            });
        });
    </script>

</body>
</html>