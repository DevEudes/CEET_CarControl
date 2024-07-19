<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>CEET-CarControl</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ url('vendors/feather/feather.css') }}">
    <link rel="stylesheet" href="{{ url('vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ url('vendors/css/vendor.bundle.base.css') }}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{ url('vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('js/select.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ url('vendors/mdi/css/materialdesignicons.min.css') }}">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ url('css/vertical-layout-light/style.css') }}">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{ url('images/ceet_logo.png') }}" />
</head>

<body>
    <div class="container-scroller">
        @include('partials.navbar')

        <div class="container-fluid page-body-wrapper">
            @include('partials.sidebar')
            <div class="main-panel">
                <div class="content-wrapper">
                    @include('partials.header')    
                    @yield('content')
                    @include('partials.footer')
                </div>
            </div>
        </div>
    </div>
    
    <!-- plugins:js -->
    <script src="{{ url('vendors/js/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{ url('vendors/chart.js/Chart.min.js') }}"></script>
    <script src="{{ url('vendors/datatables.net/jquery.dataTables.js') }}"></script>
    <script src="{{ url('vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ url('js/dataTables.select.min.js') }}"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ url('js/off-canvas.js') }}"></script>
    <script src="{{ url('js/hoverable-collapse.js') }}"></script>
    <script src="{{ url('js/template.js') }}"></script>
    <script src="{{ url('js/settings.js') }}"></script>
    <script src="{{ url('js/todolist.js') }}"></script>
    <!-- endinject -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            function updateDateTime() {
                const dateElement = document.getElementById('current-date');
                const timeElement = document.getElementById('current-time');
                const now = new Date();
                const optionsDate = {
                    weekday: 'long',
                    year: 'numeric',
                    month: 'long',
                    day: 'numeric'
                };
                const optionsTime = {
                    hour: '2-digit',
                    minute: '2-digit'
                };
                dateElement.textContent = now.toLocaleDateString('fr', optionsDate);
                timeElement.textContent = now.toLocaleTimeString('fr', optionsTime);
            }
            updateDateTime();
            setInterval(updateDateTime, 1000);
        });
    </script>
</body>
</html>
