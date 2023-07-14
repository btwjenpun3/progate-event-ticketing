<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Kaia Event Ticketing</title>
    <link rel="stylesheet" href="{{ asset('assets/css/main/app.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/pages/auth.css') }}">
    <link rel="shortcut icon" href="{{ asset('assets/images/logo/favicon.svg') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('assets/images/logo/favicon.png') }}" type="image/png">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
    <div id="auth">
        <div class="row h-100">
            <div class="col-lg-5 col-12">
                <div id="auth-left">
                    <div class="auth-logo">
                        <a href="index.html"><img src="assets/images/logo/logo.svg" alt="Logo"></a>
                    </div>
                    <h1 class="auth-title">Log in.</h1>
                    <p class="auth-subtitle mb-5">Log in with your data that you entered during registration.</p>
                    <div id="loginMessage"></div>
                    <div class="form-group position-relative has-icon-left mb-4">
                        <input type="text" id="name" name="name" class="form-control form-control-xl"
                            placeholder="Username">
                        <div class="form-control-icon">
                            <i class="bi bi-person"></i>
                        </div>
                    </div>
                    <div class="form-group position-relative has-icon-left mb-4">
                        <input type="password" id="password" name="password" class="form-control form-control-xl"
                            placeholder="Password">
                        <div class="form-control-icon">
                            <i class="bi bi-shield-lock"></i>
                        </div>
                    </div>
                    <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5" id="submit">Log in</button>
                    <div class="text-center mt-5 text-lg fs-4">
                        <p class="text-gray-600">Get any problem? <a href="#" class="font-bold">Contact
                                us</a>.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 d-none d-lg-block">
                <div id="auth-right">
                </div>
            </div>
        </div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.7.0.min.js"
    integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {
        $('#submit').click(function() {
            // e.preventDefault();
            var name = $('#name').val();
            var password = $('#password').val();
            var token = $("meta[name='csrf-token']").attr("content");
            $.ajax({
                url: '/',
                type: 'post',
                data: {
                    'name': name,
                    'password': password,
                    '_token': token
                },
                success: function(response) {
                    // Tangani respon sukses
                    var successMessage = document.createElement("div");
                    successMessage.className = "alert alert-success";
                    successMessage.textContent = "Selamat Datang."
                    $('#loginMessage').html(successMessage);
                    window.location.href = '/dashboard';

                },
                error: function(xhr, error, status) {
                    // Tangani respon error
                    var errorMessage = document.createElement("div");
                    errorMessage.className = "alert alert-danger";
                    errorMessage.textContent = xhr.responseJSON.message;

                    // Buat Form jadi is-invalid
                    $('#name').addClass('is-invalid');
                    $('#password').addClass('is-invalid');

                    $('#loginMessage').html(errorMessage);
                    setTimeout(function() {
                        errorMessage.remove();
                    }, 5000);
                }
            });
        });
    });
</script>

</html>
