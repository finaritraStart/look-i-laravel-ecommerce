<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title')</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('admin/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/vendor.bundle.addons.css') }}">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('admin/css/style.css') }}">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{ asset('admin/images/logo_2H_tech.png') }}" />
</head>

<body>
    <div class="container-scroller">
        {{-- start navbar1 --}}
        @include('include.navbar1')
        {{-- end navbar1 --}}
        <!-- partial -->


        {{-- start navbar2 --}}
        @include('include.navbar2')
        {{-- end navbar2 --}}
        <div class="main-panel">
            <div class="content-wrapper">
                {{-- start content --}}
                @yield('content')
                {{-- end content --}}
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->

            </div>
            @include('include.adminfooter')
        </div>







        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    </div>
    <!-- plugins:js -->
    <script src="{{ asset('admin/js/vendor.bundle.base.js') }}"></script>
    <script src="{{ asset('admin/js/vendor.bundle.addons.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page-->
    <!-- End plugin js for this page-->
    <!-- inject:js -->
    <script src="{{ asset('admin/js/off-canvas.js') }}"></script>
    <script src="{{ asset('admin/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('admin/js/template.js') }}"></script>
    <script src="{{ asset('admin/js/settings.js') }}"></script>
    <script src="{{ asset('admin/js/todolist.js') }}"></script>
    <script src="{{ asset('admin/js/bootbox.min.js') }}"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    @yield('scripts')
    <!-- End custom js for this page-->
    <script>
        $(document).on("click", "#delete", function(e) {
            e.preventDefault();
            var link = $(this).attr("href");
            bootbox.confirm("Vouez-vous vraiment supprimer cet élement ?", function(confirmed) {
                if (confirmed) {
                    window.location.href = link;
                };
            });
        });
    </script>

</body>

</html>
