<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Bootstrap -->
    <link href="{{ asset('vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ asset('vendors/nprogress/nprogress.css') }}" rel="stylesheet">
    <!-- iCheck -->
    <link href="{{ asset('vendors/iCheck/skins/flat/green.css') }}" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="{{ asset('vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css') }}" rel="stylesheet">
    <!-- PNotify -->
    <link href="{{ asset('vendors/pnotify/dist/pnotify.css') }}" rel="stylesheet">
    <link href="{{ asset('vendors/pnotify/dist/pnotify.buttons.css') }}" rel="stylesheet">
    <link href="{{ asset('vendors/pnotify/dist/pnotify.nonblock.css') }}" rel="stylesheet">
    <!-- Dropzone.js -->
    <link href="{{ asset('vendors/dropzone/dist/min/dropzone.min.css') }}" rel="stylesheet">
    <!-- FullCalendar -->
    <link href="{{ asset('vendors/fullcalendar/dist/fullcalendar.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendors/fullcalendar/dist/fullcalendar.print.css') }}" rel="stylesheet" media="print">
    <!-- iCheck -->
    <link href="{{ asset('vendors/iCheck/skins/flat/green.css') }}" rel="stylesheet">
    <!-- JQVMap -->
    <link href="{{ asset('vendors/jqvmap/dist/jqvmap.min.css') }}" rel="stylesheet" />
    <!-- bootstrap-wysiwyg -->
    <link href="{{ asset('vendors/google-code-prettify/bin/prettify.min.css') }}" rel="stylesheet">
    <!-- Select2 -->
    <link href="{{ asset('vendors/select2/dist/css/select2.min.css') }}" rel="stylesheet">
    <!-- Switchery -->
    <link href="{{ asset('vendors/switchery/dist/switchery.min.css') }}" rel="stylesheet">
    <!-- starrr -->
    <link href="{{ asset('vendors/starrr/dist/starrr.css') }}" rel="stylesheet">
    <!-- Datatables -->
    <link href="{{ asset('vendors/datatables.net-bs/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css') }}"
        rel="stylesheet">
    <link href="{{ asset('vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css') }}" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="{{ asset('vendors/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet">
    <!-- bootstrap-datetimepicker -->
    <link href="{{ asset('vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css') }}"
        rel="stylesheet">
    <!-- Ion.RangeSlider -->
    <link href="{{ asset('vendors/normalize-css/normalize.css') }}" rel="stylesheet">
    <link href="{{ asset('vendors/ion.rangeSlider/css/ion.rangeSlider.css') }}" rel="stylesheet">
    <link href="{{ asset('vendors/ion.rangeSlider/css/ion.rangeSlider.skinFlat.css') }}" rel="stylesheet">
    <!-- Bootstrap Colorpicker -->
    <link href="{{ asset('vendors/mjolnic-bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') }}"
        rel="stylesheet">
    <link href="{{ asset('vendors/cropper/dist/cropper.min.css') }}" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="{{ asset('build/css/custom.css') }}" rel="stylesheet">
    <title>Login</title>

    <style>
        .body {
            background: #fff;
            background-repeat: no-repeat;
            height: 100vh;
            max-height: 100vh;
            width: auto;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .login_content {
            padding: 20px;
            min-width: 280px;
            max-width: 350px;
            width: 100%;
        }



        @media (max-width: 400px) {
            .login_content {
                padding: 15px;
                width: 90%;
            }
        }
    </style>

    <style>
        .password-container {

            position: relative;
            /* display: inline-block; */
            width: 100%;
        }

        .password-container input {
            /* padding-right: 30px; Make space for the eye icon */
        }

        .password-container i {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            color: #000000
        }
    </style>
</head>

<body class=" body login" style="">
    <section class="login_content">
        {{-- <img src="{{asset('assets/images/Outdoor.png')}}" alt=""> --}}

        <form action="{{route('login')}}" method="POST">
            @csrf
            <h1>Login Form</h1>
            @if (Session::get('failure', false))
                <?php $data = Session::get('failure'); ?>
                <h5 style="color: red;">
                    {{ $data }}
                </h5>
            @endif

            <div>
                <input type="text" class="form-control" placeholder="Email" required="" name="email" />
            </div>
            <div class="password-container">
                <input type="password" class="form-control" placeholder="Password" required="" name="password"
                    id="password" />
                <i class="fa fa-eye" id="togglePassword" style="cursor: pointer;"></i>
            </div>
            <div>
                <button class="btn btn-primary" type="submit">Log in</button>
                <a class="d-none" class="reset_pass" href="#">Lost your password?</a>
            </div>

            <div class="clearfix"></div>

            <div class="separator">
                <div class="clearfix"></div>
                <br />
                <div>
                    {{-- <h1><i class="fa fa-paw"></i> Gentelella Alela!</h1> --}}
                    <p>©2024 All Rights Reserved.</p>
                </div>
            </div>
        </form>
    </section>
</body>

<script>
    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#password');

    togglePassword.addEventListener('click', function() {
        // Toggle the type attribute using getAttribute() and setAttribute()
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);

        // Toggle the eye / eye-slash icon
        this.classList.toggle('fa-eye-slash');
    });
</script>

</html>
