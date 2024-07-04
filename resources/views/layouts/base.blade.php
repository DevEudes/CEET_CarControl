<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Skydash Admin</title>
  <!-- plugins:css --> 
  <link rel="stylesheet" href={{ url('vendors/feather/feather.css') }}>
  <link rel="stylesheet" href={{ url('vendors/ti-icons/css/themify-icons.css') }}>
  <link rel="stylesheet" href={{ url('vendors/css/vendor.bundle.base.css') }}>
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href={{ url('vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}>
  <link rel="stylesheet" href={{ url('vendors/ti-icons/css/themify-icons.css') }}>
  <link rel="stylesheet" type="text/css" href={{ url('js/select.dataTables.min.css') }}>
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href={{ url('css/vertical-layout-light/style.css') }}>
  <!-- endinject -->
  <link rel="shortcut icon" href={{ url('images/favicon.png') }} />
</head>
<body>
    <div class="container-scroller">
        <!-- navbar -->
        <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                <a class="navbar-brand brand-logo mr-5" href="index.html"><img src={{ url('images/ceet_logo.png')}} class="mr-2" alt="logo" style="width: 50px; height: auto;"/></a>
                <a class="navbar-brand brand-logo-mini" href="index.html">CEET</a>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                <span class="icon-menu"></span>
                </button>
                <ul class="navbar-nav mr-lg-2">
                    <li class="nav-item nav-search d-none d-lg-block">
                        <div class="input-group">
                            <div class="input-group-prepend hover-cursor" id="navbar-search-icon">
                                <span class="input-group-text" id="search">
                                <i class="icon-search"></i>
                                </span>
                            </div>
                            <input type="text" class="form-control" id="navbar-search-input" placeholder="Search now" aria-label="search" aria-describedby="search">
                        </div>
                    </li>
                </ul>
                <ul class="navbar-nav navbar-nav-right">
                    <li class="nav-item dropdown">
                        <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
                        <i class="icon-bell mx-0"></i>
                        <span class="count"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
                        <p class="mb-0 font-weight-normal float-left dropdown-header">Notifications</p>
                        <a class="dropdown-item preview-item">
                            <div class="preview-thumbnail">
                            <div class="preview-icon bg-success">
                                <i class="ti-info-alt mx-0"></i>
                            </div>
                            </div>
                            <div class="preview-item-content">
                            <h6 class="preview-subject font-weight-normal">Application Error</h6>
                            <p class="font-weight-light small-text mb-0 text-muted">
                                Just now
                            </p>
                            </div>
                        </a>
                        <a class="dropdown-item preview-item">
                            <div class="preview-thumbnail">
                            <div class="preview-icon bg-warning">
                                <i class="ti-settings mx-0"></i>
                            </div>
                            </div>
                            <div class="preview-item-content">
                            <h6 class="preview-subject font-weight-normal">Settings</h6>
                            <p class="font-weight-light small-text mb-0 text-muted">
                                Private message
                            </p>
                            </div>
                        </a>
                        <a class="dropdown-item preview-item">
                            <div class="preview-thumbnail">
                            <div class="preview-icon bg-info">
                                <i class="ti-user mx-0"></i>
                            </div>
                            </div>
                            <div class="preview-item-content">
                            <h6 class="preview-subject font-weight-normal">New user registration</h6>
                            <p class="font-weight-light small-text mb-0 text-muted">
                                2 days ago
                            </p>
                            </div>
                        </a>
                        </div>
                    </li>
                </ul>
                <ul>
                    <li>
                        @if (Route::has('login'))
                        @auth
                            <a
                                href="{{ url('/dashboard') }}"
                                class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                            >
                                Dashboard
                            </a>
                        @else
                            <a
                                href="{{ route('login') }}"
                                class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                            >
                                Log in
                            </a>

                            @if (Route::has('register'))
                                <a
                                    href="{{ route('register') }}"
                                    class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                                >
                                    Register
                                </a>
                            @endif
                        @endauth
                        @endif
                    </li>
                </ul>
            </div>
        </nav>
        <!-- navbar -->

        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_sidebar.html -->
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link" href="index.html">
                        <i class="icon-grid menu-icon"></i>
                        <span class="menu-title">Gestionnaire des fiches</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#vehicule" aria-expanded="false" aria-controls="error">
                        <i class="icon-paper menu-icon"></i>
                        <span class="menu-title">Véhicules</span>
                        <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="vehicule">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"> <a class="nav-link" href="pages/samples/error-404.html"> Inventire des véhicules </a></li>
                            <li class="nav-item"> <a class="nav-link" href="pages/samples/error-500.html"> Ajouter un véhicule </a></li>
                        </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#fiche_sortie" aria-expanded="false" aria-controls="ui-basic">
                        <i class="icon-layout menu-icon"></i>
                        <span class="menu-title">Sorties</span>
                        <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="fiche_sortie">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"> <a class="nav-link" href="pages/ui-features/buttons.html">Liste des fiches</a></li>
                            <li class="nav-item"> <a class="nav-link" href="pages/ui-features/dropdowns.html">Ajouter</a></li>
                        </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#fiche_appvnmt" aria-expanded="false" aria-controls="form-elements">
                        <i class="icon-columns menu-icon"></i>
                        <span class="menu-title">Approvisionnements</span>
                        <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="fiche_appvnmt">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"><a class="nav-link" href="pages/forms/basic_elements.html">Liste des fiches</a></li>
                            <li class="nav-item"><a class="nav-link" href="pages/forms/basic_elements.html">Ajouter</a></li>
                        </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#fiche_maintenance" aria-expanded="false" aria-controls="charts">
                        <i class="icon-bar-graph menu-icon"></i>
                        <span class="menu-title">Maintenances</span>
                        <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="fiche_maintenance">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"> <a class="nav-link" href="pages/charts/chartjs.html">Liste des fiches</a></li>
                            <li class="nav-item"> <a class="nav-link" href="pages/charts/chartjs.html">Ajouter</a></li>
                        </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#magasin" aria-expanded="false" aria-controls="tables">
                        <i class="icon-grid-2 menu-icon"></i>
                        <span class="menu-title">Magasin</span>
                        <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="magasin">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"> <a class="nav-link" href="pages/tables/basic-table.html">Bon de sortie</a></li>
                            <li class="nav-item"> <a class="nav-link" href="pages/tables/basic-table.html">Pièces détachées</a></li>
                        </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#demande_achat" aria-expanded="false" aria-controls="icons">
                        <i class="icon-contract menu-icon"></i>
                        <span class="menu-title">Demande d'achat</span>
                        <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="demande_achat">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"> <a class="nav-link" href="pages/icons/mdi.html">Liste des fiches</a></li>
                            <li class="nav-item"> <a class="nav-link" href="pages/icons/mdi.html">Ajouter</a></li>
                        </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#aut" aria-expanded="false" aria-controls="error">
                        <i class="icon-paper menu-icon"></i>
                        <span class="menu-title">Fiche d'affection</span>
                        <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="aut">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"> <a class="nav-link" href="pages/samples/error-404.html">Liste des fiches </a></li>
                            <li class="nav-item"> <a class="nav-link" href="pages/samples/error-500.html"> Ajouter </a></li>
                        </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
                        <i class="icon-head menu-icon"></i>
                        <span class="menu-title">User Pages</span>
                        <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="auth">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"> <a class="nav-link" href="pages/samples/login.html"> Login </a></li>
                            <li class="nav-item"> <a class="nav-link" href="pages/samples/register.html"> Register </a></li>
                        </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#documents" aria-expanded="false" aria-controls="error">
                        <i class="icon-paper menu-icon"></i>
                        <span class="menu-title">Documents</span>
                        <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="documents">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"> <a class="nav-link" href="pages/samples/error-404.html"> Assurance </a></li>
                            <li class="nav-item"> <a class="nav-link" href="pages/samples/error-500.html"> Visite technique </a></li>
                            <li class="nav-item"> <a class="nav-link" href="pages/samples/error-500.html"> TVM </a></li>
                        </ul>
                        </div>
                    </li>
                </ul>
            </nav>
            <!-- sidebar -->

            <!-- Container-scroller -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        <!-- Header -->
                        <div class="col-md-12 grid-margin">
                            <div class="row">
                                <!-- title -->
                                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                                    <h1 class="font-weight-bold">CarControl</h1>
                                    <h4 class="font-weight-normal mb-0">Simplifiez la Gestion de Votre Parc Automobile</h4>
                                </div>
                                <!-- title -->

                                <!-- Date Heure -->
                                <div class="col-10 col-xl-4">
                                    <div class="justify-content-end d-flex">
                                        <div class="date-time-container text-center bg-white p-3 rounded">
                                            <div id="current-date" class="font-weight-bold mb-2"></div>
                                                <div id="current-time" class="text-muted"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Date Heure -->
                            </div>
                        </div>
                        <!-- Header -->

                        <!-- cards -->
                        <div class="row">
                            <div class="col-md-6 grid-margin stretch-card">
                                <div class="card tale-bg">
                                    <div class="card-people mt-auto">
                                        <img src="{{ url('images/dashboard/ceet_logo.png') }}" alt="ceet logo" style="width: 200px; height: auto;">
                                        <div class="weather-info">
                                            <div class="d-flex">
                                                <div>
                                                    <h2 class="mb-0 font-weight-normal"><i class="icon-sun mr-2"></i>CEET</h2>
                                                </div>
                                                <div class="ml-2">
                                                    <!-- <h4 class="location font-weight-normal">Bangalore</h4> -->
                                                    <h6 class="font-weight-normal">Compagnie</h6>
                                                    <h6 class="font-weight-normal">Energie</h6>
                                                    <h6 class="font-weight-normal">Electrique</h6>
                                                    <h6 class="font-weight-normal">du Togo</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 grid-margin transparent">
                                <div class="row">
                                    <div class="col-md-6 mb-4 stretch-card transparent">
                                        <div class="card card-tale">
                                            <div class="card-body">
                                                <p class="mb-4">Véhicules disponibles</p>
                                                <p class="fs-30 mb-2">4006</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4 stretch-card transparent">
                                        <div class="card card-dark-blue">
                                            <div class="card-body">
                                                <p class="mb-4">Véhicules en maintenance</p>
                                                <p class="fs-30 mb-2">61344</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
                                        <div class="card card-light-blue">
                                            <div class="card-body">
                                                <p class="mb-4">Chauffeurs disponibles</p>
                                                <p class="fs-30 mb-2">34040</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 stretch-card transparent">
                                        <div class="card card-light-danger">
                                            <div class="card-body">
                                                <p class="mb-4">Nombre de sortie en cours</p>
                                                <p class="fs-30 mb-2">47033</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                             </div>
                        </div>
                        <!-- cards -->

                        @yield('container')

                        <!-- footer -->
                        <footer class="footer">
                            <div class="d-sm-flex justify-content-center justify-content-sm-between">
                                <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2024. Compagnie Energie Electrique du Togo. Tout droits reservés.</span>
                            </div>
                        </footer> 
                        <!-- footer -->
                    </div>
                </div>   
            </div>
            <!-- container-scroller -->
        </div>
        <!-- plugins:js -->
        <script src="vendors/js/vendor.bundle.base.js"></script>
        <!-- endinject -->
        <!-- Plugin js for this page -->
        <script src="vendors/chart.js/Chart.min.js"></script>
        <script src="vendors/datatables.net/jquery.dataTables.js"></script>
        <script src="vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
        <script src="js/dataTables.select.min.js"></script>

        <!-- End plugin js for this page -->
        <!-- inject:js -->
        <script src="js/off-canvas.js"></script>
        <script src="js/hoverable-collapse.js"></script>
        <script src="js/template.js"></script>
        <script src="js/settings.js"></script>
        <script src="js/todolist.js"></script>
        <!-- endinject -->
        <!-- Custom js for this page-->
        <script src="js/dashboard.js"></script>
        <script src="js/Chart.roundedBarCharts.js"></script>
        <!-- End custom js for this page-->
    </body>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        function updateDateTime() {
        const dateElement = document.getElementById('current-date');
        const timeElement = document.getElementById('current-time');

        const now = new Date();
        const optionsDate = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
        const optionsTime = { hour: '2-digit', minute: '2-digit', second: '2-digit' };

        dateElement.textContent = now.toLocaleDateString('fr', optionsDate);
        timeElement.textContent = now.toLocaleTimeString('fr', optionsTime);
        }

        updateDateTime();
        setInterval(updateDateTime, 1000);
    });
    </script>
</html>

