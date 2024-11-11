<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal AJI</title>

    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('font-awesome/css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('css/animate.css') }}" rel="stylesheet">
    {{-- <link href="{{ asset('css/plugins/dataTables/datatables.min.css') }}" rel="stylesheet"> --}}
    <link href="{{ asset('css/plugins/datapicker/datepicker3.css') }}" rel="stylesheet">
    <link href="{{ asset('css/plugins/jasny/jasny-bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/plugins/summernote/summernote-bs4.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/fixedheader/3.2.3/css/fixedHeader.bootstrap.min.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/responsive/2.4.0/css/responsive.bootstrap.min.css">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    @yield('css')
</head>

<body class="pace-done mini-navbar" id="body">
    <div id="wrapper">
        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav metismenu" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element">
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <span class="block m-t-xs font-bold">{{ ucwords(auth()->user()->name) }}</span>
                                <span
                                    class="text-muted text-xs block">{{ auth()->user()->getRoleNames()->implode(', ') }}</span>

                            </a>
                        </div>
                        <div class="logo-element">
                            AJI
                        </div>
                    </li>
                    <li class="{{ Request::is('/*') ? 'active' : '' }}">
                        <a href="{{ url('/') }}"><i class="fa fa-dashboard"></i><span
                                class="nav-label">Dashboard</span></a>
                    </li>
                    @if (!Auth::user()->hasRole('Admin'))
                        <li class="{{ Request::is('profile*') ? 'active' : '' }}">
                            <a href="{{ url('/profile') }}"><i class="fa fa-user-o"></i><span
                                    class="nav-label">Profile</span></a>
                        </li>
                    @endif

                    @if (Auth::user()->hasRole('Admin'))
                        <li class="{{ Request::is('*management-akun') ? 'active' : '' }}">
                            <a href="#"><i class="fa fa-users"></i> <span class="nav-label">Access
                                    Control</span><span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level collapse">
                                <li class="{{ Request::is('Akun') ? 'active' : '' }}"><a
                                        href="{{ route('users') }}">Users</a></li>
                                <li class="{{ Request::is('Role') ? 'active' : '' }}"><a
                                        href="{{ route('roles') }}">Roles</a></li>
                                <li class="{{ Request::is('Permision') ? 'active' : '' }}"><a
                                        href="{{ route('permissions') }}">Permisions</a></li>
                                {{-- <li><a href="carousel.html">Dilaporkan</a></li> --}}
                            </ul>
                        </li>
                        <li class="{{ Request::is('*struktur-management') ? 'active' : '' }}">
                            <a href="#"><i class="fa fa-cubes"></i> <span class="nav-label">Struktur
                                    Manajemen</span><span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level collapse">
                                <li class="{{ Request::is('*department') ? 'active' : '' }}"><a
                                        href="{{ route('department') }}">Departement</a></li>
                                <li class="{{ Request::is('*department-detail') ? 'active' : '' }}"><a
                                        href="{{ route('detail.department') }}">Detail Departement</a></li>
                                <li class="{{ Request::is('position') ? 'active' : '' }}"><a
                                        href="{{ route('position') }}">Position</a></li>
                                {{-- <li><a href="carousel.html">Dilaporkan</a></li> --}}
                            </ul>
                        </li>
                    @endif

                </ul>
            </div>
        </nav>

        <div id="page-wrapper" class="gray-bg">
            <div class="row border-bottom mb-4">
                <nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0">
                    <div class="navbar-header">
                        <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i
                                class="fa fa-bars"></i> </a>
                    </div>
                    <ul class="nav navbar-top-links navbar-right">
                        <li>
                            <span class="m-r-sm text-muted welcome-message">{{ ucwords(auth()->user()->name) }}</span>
                        </li>

                        <li class="pr-3">
                            <form action="{{ route('logout') }}" method="POST" id="logoutForm">
                                @csrf
                                <button type="submit" class="btn btn-danger" id="logoutBtn">
                                    <i class="fa fa-sign-out"></i> Log out
                                </button>
                            </form>
                        </li>
                    </ul>
                </nav>
            </div>


            @yield('header')
            <div class="wrapper wrapper-content">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                @yield('content')
            </div>
            <div class="footer">
                <div class="float-right">
                    <strong>AJI Portal</strong>
                </div>
                <div>
                    <strong>Copyright</strong> Portal Astra Juoku Indonesia. &copy; 2024
                </div>
            </div>
        </div>
    </div>
    <!-- Mainly scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> <!-- Updated jQuery version -->
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <script src="{{ asset('js/plugins/metisMenu/jquery.metisMenu.js') }}"></script>
    <script src="{{ asset('js/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>
    {{-- datepicker --}}
    <script src="{{ asset('js/plugins/datapicker/bootstrap-datepicker.js') }}"></script>

    <script>
        const body = document.getElementById('body');
        if (window.matchMedia("(max-width: 768px)").matches) {
            body.setAttribute('class', 'pace-done');
        } else {
            body.setAttribute('class', 'pace-done mini-navbar');
        }
    </script>
    <!-- SUMMERNOTE -->
    <script src="{{ asset('js/plugins/summernote/summernote-bs4.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote-cleaner/0.7.0/summernote-cleaner.min.js"></script>
    <!-- Jasny -->
    <script src="{{ asset('js/plugins/jasny/jasny-bootstrap.min.js') }}"></script>
    <!-- Flot -->
    <script src="{{ asset('js/plugins/flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('js/plugins/flot/jquery.flot.tooltip.min.js') }}"></script>
    <script src="{{ asset('js/plugins/flot/jquery.flot.spline.js') }}"></script>
    <script src="{{ asset('js/plugins/flot/jquery.flot.resize.js') }}"></script>
    <script src="{{ asset('js/plugins/flot/jquery.flot.pie.js') }}"></script>
    <script src="{{ asset('js/plugins/flot/jquery.flot.symbol.js') }}"></script>
    <script src="{{ asset('js/plugins/flot/jquery.flot.time.js') }}"></script>


    <!-- Peity -->
    <script src="{{ asset('js/plugins/peity/jquery.peity.min.js') }}"></script>
    <script src="{{ asset('js/demo/peity-demo.js') }}"></script>

    <!-- Custom and plugin javascript -->
    <script src="{{ asset('js/inspinia.js') }}"></script>
    <script src="{{ asset('js/plugins/pace/pace.min.js') }}"></script>

    <!-- jQuery UI -->
    {{-- <script src="{{ asset('js/plugins/jquery-ui/jquery-ui.min.js') }}"></script> --}}

    <!-- Jvectormap -->
    <script src="{{ asset('js/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js') }}"></script>
    <script src="{{ asset('js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>

    <!-- EayPIE -->
    <script src="{{ asset('js/plugins/easypiechart/jquery.easypiechart.js') }}"></script>

    <!-- Sparkline -->
    <script src="{{ asset('js/plugins/sparkline/jquery.sparkline.min.js') }}"></script>

    <!-- Sparkline demo data  -->
    <script src="{{ asset('js/demo/sparkline-demo.js') }}"></script>
    {{-- <script src="{{ asset('js/plugins/dataTables/datatables.min.js') }}"></script>
    <script src="{{ asset('js/plugins/dataTables/dataTables.bootstrap4.min.js') }}"></script> --}}
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/fixedheader/3.2.3/js/dataTables.fixedHeader.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.4.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.4.0/js/responsive.bootstrap.min.js"></script>
    @yield('script')
    <script>
        $('.custom-file-input').on('change', function() {
            let fileName = $(this).val().split('\\').pop();
            $(this).next('.custom-file-label').addClass("selected").html(fileName);
        });
    </script>
    <script>
        document.getElementById('logoutForm').addEventListener('submit', function() {
            document.getElementById('logoutBtn').disabled = true;
        });
    </script>
    {{-- <script type="text/javascript">
        $(document).ready(function() {
            // Check if any child <li> elements are active
            if ($('#managementMenu').find('li.active').length > 0) {
                // Open the collapse menu if any child <li> is active
                $('#managementMenu .collapse').addClass('in');
            }
        });
    </script> --}}

    <script>
        // Nonaktifkan klik kanan
        document.addEventListener('contextmenu', event => event.preventDefault());

        // Nonaktifkan F12, Ctrl+Shift+I, Ctrl+Shift+J, dan kombinasi lainnya
        document.onkeydown = function(e) {
            // F12
            if (e.keyCode == 123) {
                return false;
            }
            // Ctrl+Shift+I, Ctrl+Shift+J, Ctrl+U
            if (e.ctrlKey && e.shiftKey && (e.keyCode == 73 || e.keyCode == 74) || e.ctrlKey && e.keyCode == 85) {
                return false;
            }
            // Ctrl+Shift+C
            if (e.ctrlKey && e.shiftKey && e.keyCode == 67) {
                return false;
            }
        };
    </script>
    <script>
        // window.addEventListener('beforeunload', function(e) {
        //     // Contoh panggilan logout melalui fetch (tidak dijamin selalu dipanggil tergantung browser)
        //     if (window.location.pathname.startsWith('/')) {
        //         // Lakukan sesuatu jika kondisi true
        //     } else {
        //         fetch('/logout', {
        //             method: 'POST',
        //             headers: {
        //                 'X-CSRF-TOKEN': '{{ csrf_token() }}'
        //             }
        //         });
        //     }
        // });
    </script>

</body>

</html>
