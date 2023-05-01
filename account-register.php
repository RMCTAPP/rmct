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
            <div class="text-center mb-4">
                <img src="../shared/media/logo-no-bg.png" alt="image" class="imaged w-25">
            </div>
            <div class="row mx-3 mt-2">
                <h2 class="text-light">Sign up</h2>
                <h4 class="text-light mb-4">Create your account</h4>
                <form id="register-form">
                    <div class="form-group boxed mb-1">
                        <div class="input-wrapper">
                            <label class="label text-light" for="name">Full name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="enter here">
                        </div>
                    </div>
                    <div class="form-group boxed mb-1">
                        <div class="input-wrapper">
                            <label class="label text-light" for="address">Address</label>
                            <input type="text" class="form-control" id="address" name="address" placeholder="enter here">
                        </div>
                    </div>
                    <div class="form-group boxed mb-1">
                        <div class="input-wrapper">
                            <label class="label text-light" for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="enter here">
                        </div>
                    </div>
                    <div class="form-group boxed mb-1">
                        <div class="input-wrapper">
                            <label class="label text-light" for="contact_no">Contact</label>
                            <input type="number" class="form-control" id="contact_no" name="contact_no" placeholder="enter here">
                        </div>
                    </div>
                    <div class="form-group boxed mb-1">
                        <div class="input-wrapper">
                            <label class="label text-light" for="password">Password</label>
                            <input type="text" class="form-control" id="password" name="password" autocomplete="off"placeholder="enter here">
                        </div>
                    </div>

                    <button type="submit" id="login-submit" class="btn bg-white btn-text-primary btn-lg btn-block mt-3">Sign up</button>

                    <p class="text-center mt-2 mb-2">Already have an account?</p>

                    <a href="index.php" class="btn btn-outline-light btn-lg btn-block">Login</a>
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
            $("#register-form").validate({
                errorElement: "span",
                errorPlacement: function(error, element) {
                    error.insertAfter(element.parent());
                },
                rules: {
                    name: {
                        required: true
                    },
                    address: {
                        required: true
                    },
                    email: {
                        required: true
                    },
                    contact_no: {
                        required: true
                    },
                    password: {
                        required: true
                    }
                },
                messages: {
                    name: {
                        required: "Enter name"
                    },
                    address: {
                        required: "Enter address"
                    },
                    email: {
                        required: "Enter email"
                    },
                    contact_no: {
                        required: "Enter contact"
                    },
                    password: {
                        required: "Enter password"
                    }
                },
                submitHandler: function(form) {
                    var button = $('#register-submit'); 
                    $.ajax({
                        url: "account-register-ajax.php",
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
                                $('#notif-error').modal('show');
                                $('p#error-message').text(response.message);            
                            }

                            if (response.status == 'success') {
                                $('#notif-success').modal('show');
                                $('p#success-message').text(response.message);  
                                setTimeout(function() {
                                    $('#notif-success').modal('hide');
                                }, 2400);
                                setTimeout(function() {
                                    window.location.replace("index.php");
                                }, 3000);
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