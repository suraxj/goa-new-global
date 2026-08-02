<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-vertical-style="overlay" data-theme-mode="light" data-header-styles="light" data-menu-styles="light" data-toggled="close">


<!-- Mirrored from codeigniter.spruko.com/mamix/mamix/sign-in-basic by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 23 Jul 2024 06:47:15 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>

    <!-- Meta Data -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="Description" content="Codeigniter Bootstrap Responsive Admin Web Dashboard Template">
    <meta name="Author" content="Spruko Technologies Private Limited">
    <meta name="keywords" content="codeigniter, admin dashboard, admin panel, admin template, admin, admin dashboard template, sales dashboard, analytics dashboard, dashboard, crypto dashboard, admin panel templatedashboard bootstrap 5, dashboard template, codeigniter framework.">

    <title> MAMIX - Codeigniter Bootstrap 5 Premium Admin & Dashboard Template </title>

    <link rel="icon" href="/web-assets/images/brand-logos/favicon.ico" type="image/x-icon">
    <!-- <script src="/web-assets/js/authentication-main.js"></script> -->
    <link id="style" href="/web-assets/libs/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/web-assets/libs/toastify/toastify.css">
    <link href="/web-assets/css/styles.css" rel="stylesheet">
    <link href="/web-assets/css/icons.css" rel="stylesheet">
</head>

<body class="authentication-background">
    <div class="container">
        <div class="row justify-content-center align-items-center authentication authentication-basic h-100">
            <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-6 col-sm-8 col-12">
                <div class=" d-flex justify-content-center">
                    <a href="/">
                    <img src="/assets/images/unnamed.gif" class="img-fluid rounded" width="150">
                    </a>
                </div>
                <div class="card custom-card my-4">
                    <div class="card-body p-5">
                        <p class="h4 mb-2 fw-semibold">Sign In</p>
                        <form id="loginForm" method="post">
                            @csrf
                            <div class="row gy-3">
                                <div class="col-xl-12">
                                    <label for="signin-username" class="form-label text-default">User email</label>
                                    <input type="email" class="form-control" id="signin-username" name="email" placeholder="user email">
                                </div>
                                <div class="col-xl-12 mb-2">
                                    <div class="position-relative">
                                        <label for="signin-username" class="form-label text-default">User Password</label>

                                        <input type="password" class="form-control" id="signin-password" name="password" placeholder="password">
                                        <a href="javascript:void(0);" class="show-password-button text-muted" onclick="createpassword('signin-password',this)" id="button-addon2"><i class="ri-eye-off-line align-middle"></i></a>
                                    </div>
                                </div>
                                <div class="d-grid mt-4">
                                    <button type="submit" name="submit" class="btn btn-primary">Sign In</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="/web-assets/code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src="/web-assets/libs/toastify/toastify.js"></script>

    <script src="/web-assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/web-assets/js/show-password.js"></script>
    <script>
        $(function() {
            var form = '#loginForm';
            $(form).on('submit', function(event) {
                event.preventDefault();
                // var url = this.action;
                $.ajax({
                    url: '/login-post',
                    method: 'POST',
                    data: new FormData(this),
                    dataType: 'JSON',
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(response) {
                        if (response.status == 200) {
                            Toastify({
                                text: response.msg,
                                duration: 1500,
                                style: {
                                    background: "linear-gradient(to right, #00b09b, #96c93d)",
                                }
                            }).showToast();

                            setTimeout(() => {
                                window.location.href = response.url
                            }, 1500);
                        } else {
                            Toastify({
                                text: response.msg,
                                duration: 1500,
                                style: {
                                    background: "linear-gradient(to right, #00b09b, #96c93d)",
                                }
                            }).showToast();
                        }

                    },
                    error: function(response) {}
                });
            });
        })
    </script>

</body>

</html>