<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'IBASAE Dashboard')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ URL::asset('backend') }}/plugins/fontawesome-free/css/all.min.css">
    <!-- DataTables -->
    <link rel="stylesheet"
        href="{{ URL::asset('backend') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet"
        href="{{ URL::asset('backend') }}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet"
        href="{{ URL::asset('backend') }}/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ URL::asset('backend') }}/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.js"></script>
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ URL::asset('backend') }}/plugins/select2/css/select2.min.css">
    <link rel="stylesheet"
        href="{{ URL::asset('backend') }}/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    @yield('styles')
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{ url('/') }}" target="_blank" class="nav-link">Home</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{ url('sadmin/dashboard') }}" class="nav-link">Contact</a>
                </li>
            </ul>
            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">


                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.navbar -->
        @include('admin.partials.sidebar')
        <!-- Content Wrapper. Contains page content -->
        @yield('content')
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                <b>Version</b> 1.1.0
            </div>
            <strong>Copyright &copy; 2022-2023 @ All rights reserved.
        </footer>
    </div>
    <!-- ./wrapper -->
    <!-- jQuery -->
    <script src="{{ URL::asset('backend') }}/plugins/jquery/jquery.min.js"></script>
    <!-- jquery-validation -->
    <script src="{{ URL::asset('backend') }}/plugins/jquery-validation/jquery.validate.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ URL::asset('backend') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="{{ URL::asset('backend') }}/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ URL::asset('backend') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ URL::asset('backend') }}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{ URL::asset('backend') }}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="{{ URL::asset('backend') }}/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="{{ URL::asset('backend') }}/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="{{ URL::asset('backend') }}/plugins/jszip/jszip.min.js"></script>
    <script src="{{ URL::asset('backend') }}/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="{{ URL::asset('backend') }}/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="{{ URL::asset('backend') }}/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="{{ URL::asset('backend') }}/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="{{ URL::asset('backend') }}/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <!-- AdminLTE App -->
    <script src="{{ URL::asset('backend') }}/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ URL::asset('backend') }}/dist/js/demo.js"></script>
    {{-- Custom JS --}}
    <script src="{{ URL::asset('backend') }}/dist/js/admin_js.js"></script>
    <!-- Page specific script -->
    <script src="{{ URL::asset('backend') }}/plugins/select2/js/select2.full.min.js"></script>
    <script src="//unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    {{-- Date picker using tempusdominus --}}
    <script src="{{ URL::asset('backend') }}/plugins/moment/moment.min.js"></script>
    <script src="{{ URL::asset('backend') }}/plugins/inputmask/jquery.inputmask.min.js"></script>
    <script type="text/javascript">
        $(function() {
            //Datemask dd/mm/yyyy
            $('#datemask').inputmask('dd/mm/yyyy', {
                'placeholder': 'dd/mm/yyyy'
            })
            //Money Euro
            $('[data-mask]').inputmask()
        });
    </script>
    {{-- Data Table --}}
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "ordering": false,
                "autoWidth": false,
                //"buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
    </script>
    <!-- Select2 Page specific script -->
    <script>
        $(function() {
            //Initialize Select2 Elements
            $('.select2').select2()
            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })
        })
    </script>
    {{-- Sweet alert --}}
    @include('sweetalert::alert')
    @yield('scripts')
</body>

</html>
