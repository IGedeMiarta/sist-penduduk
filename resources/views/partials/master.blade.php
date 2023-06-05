<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Responsive Admin Dashboard Template">
    <meta name="keywords" content="admin,dashboard">
    <meta name="author" content="stacks">
    <!-- The above 6 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>{{ $title }} - Sistem Penduduk</title>
    <link rel="icon" href="{{ asset('') }}logo.png" type="image/png" />

    <?php header('Access-Control-Allow-Origin: *'); ?>
    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,700,800&display=swap" rel="stylesheet">
    <link href="{{ asset('') }}assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('') }}assets/plugins/font-awesome/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('') }}assets/plugins/perfectscroll/perfect-scrollbar.css" rel="stylesheet">
    {{-- <link href="{{ asset('') }}assets/plugins/apexcharts/apexcharts.css" rel="stylesheet"> --}}
    <link href="{{ asset('') }}assets/plugins/DataTables/datatables.min.css" rel="stylesheet">

    {{-- sweet alert --}}
    <link rel="stylesheet" href="{{ asset('') }}assets/css/sweetalert2.min.css">
    {{-- select 2 --}}
    <link href="{{ asset('') }}assets/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.2.0/dist/select2-bootstrap-5-theme.min.css" />

    <!-- Theme Styles -->
    <link href="{{ asset('') }}assets/css/main.css" rel="stylesheet">
    <link href="{{ asset('') }}assets/css/custom.css" rel="stylesheet">
    <style>
        .feather-16 {
            width: 16px;
            height: 16px;
        }
    </style>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    @stack('style')
</head>

<body>
    @if (session()->has('success'))
        <div class="success-info" data-msg="{{ session('success') }}"></div>
    @endif
    @if (session()->has('error'))
        <div class="error-info" data-msg="{{ session('error') }}"></div>
    @endif
    @if (session()->has('errorPost'))
        <div class="error-post" data-msg="{{ session('errorPost') }}"></div>
    @endif
    @if ($errors->any())
        {{-- @dd($errors->all()) --}}
        <div class="error-post" data-msg="Invalid Input!"></div>
    @endif
    <div class="page-container">
        @include('partials.navbar')

        @include('partials.sidebar')

        <div class="page-content">
            <div class="main-wrapper">
                @yield('content')
            </div>

        </div>
    </div>

    @stack('modal')
    <!-- Javascripts -->
    <script src="{{ asset('') }}assets/plugins/jquery/jquery-3.4.1.min.js"></script>
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <script src="{{ asset('') }}assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/feather-icons"></script>
    <script src="{{ asset('') }}assets/plugins/perfectscroll/perfect-scrollbar.min.js"></script>
    <script src="{{ asset('') }}assets/plugins/apexcharts/apexcharts.min.js"></script>
    <script src="{{ asset('') }}assets/js/main.min.js"></script>
    <script src="{{ asset('') }}assets/js/pages/dashboard.js"></script>
    <script src="{{ asset('') }}assets/plugins/DataTables/datatables.min.js"></script>
    <script src="{{ asset('') }}assets/js/pages/datatables.js"></script>

    <script src="{{ asset('') }}assets/sweetalert/sweetalert2.all.js"></script>
    <!-- select2 -->
    <script src="{{ asset('') }}assets/js/select2.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('.select2').select2({
                theme: "bootstrap-5",
                width: '100%',
                tags: true,
                dropdownParent: $(".ModalSelect")
            });
            $('.select2edt').select2({
                theme: "bootstrap-5",
                width: '100%',
                tags: true
            });

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })
            var success = $('.success-info').data('msg');
            var error = $('.error-info').data('msg');
            var errorPost = $('.error-post').data('msg');

            if (error) {
                if (errorPost) {
                    title = errorPost
                } else {
                    title = error
                }
                Toast.fire({
                    icon: 'error',

                    title: title
                })
            }
            if (success) {
                Toast.fire({
                    icon: 'success',
                    title: success
                })
            }
            if (errorPost) {
                $('#addModal').modal("show")
                console.log('error post');
            }
        })
    </script>
    @stack('script')
</body>

</html>
