<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-vertical-style="overlay" data-theme-mode="light" data-header-styles="light" data-menu-styles="light" data-toggled="close">


<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>

    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Hope Heritage Institute| Admin </title>
    <link rel="shortcut icon" href="/new-assets/img/vidyacampus_logo.jpeg" type="image/x-icon">
    <link id="style" href="/admin-assets/libs/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/admin-assets/libs/toastify/toastify.css">
    <link href="/admin-assets/css/styles.css" rel="stylesheet">
    <link href="/admin-assets/css/icons.css" rel="stylesheet">
</head>

<body class="authentication-background">
    <div class="container">
        <div class="row justify-content-center align-items-center authentication authentication-basic h-100">
            <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-6 col-sm-8 col-12">
                <div class="card custom-card my-4">
                    <div class="card-body p-5">
                        <div class=" d-flex justify-content-center">
                            @php
                        $setting = DB::table('site_settings')->first();
                        @endphp
                            <img src="/{{$setting->logo}}" class="img-fluid rounded mb-3" width="200">
                        </div>
                        <p class="h4 mb-2 text-center fw-semibold">Sign In</p>
                        <form id="loginForm" action="{{ route('login') }}" method="post">
                            @csrf
                            <div class="row gy-3">
                                <div class="col-xl-12">
                                    <label for="signin-username" class="form-label text-default">User email</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="signin-username" name="email" value="{{ old('email') }}" placeholder="user email" required autocomplete="email" autofocus>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-xl-12 mb-2">
                                    <div class="position-relative">
                                        <label for="signin-username" class="form-label text-default">User Password</label>

                                        <input type="password" class="form-control  @error('password') is-invalid @enderror" id="signin-password" name="password" placeholder="password" required autocomplete="current-password">
                                        <a href="javascript:void(0);" class="show-password-button text-muted" onclick="createpassword('signin-password',this)" id="button-addon2"><i class="ri-eye-off-line align-middle"></i></a>
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
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

    <script src="/admin-assets/code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src="/admin-assets/libs/toastify/toastify.js"></script>
    <script src="/admin-assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/admin-assets/js/show-password.js"></script>
    <!-- <script>
        $(function() {
            var form = '#loginForm';
            $(form).on('submit', function(event) {
                event.preventDefault();
                // var url = this.action;
                $.ajax({
                    url: "",
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
    </script> -->

</body>

</html>