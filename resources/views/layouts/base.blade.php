<!DOCTYPE html>
<html lang="fr">

<head>
    <!-- Balises méta requises -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>CEET-CarControl</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ url('vendors/feather/feather.css') }}">
    <link rel="stylesheet" href="{{ url('vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ url('vendors/css/vendor.bundle.base.css') }}">
    <!-- endinject -->
    <!-- Plugin css pour cette page -->
    <link rel="stylesheet" href="{{ url('vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('js/select.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ url('vendors/mdi/css/materialdesignicons.min.css') }}">
    <!-- Fin plugin css pour cette page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ url('css/vertical-layout-light/style.css') }}">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{ url('images/ceet_logo.png') }}" />
    <style>
        #loading-animation {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 60px;
            height: 60px;
            border: 6px solid #f3f3f3;
            border-top: 6px solid #3498db;
            border-radius: 50%;
            animation: spin 1s linear infinite, changeColor 4s linear infinite, pulse 1.5s ease-in-out infinite;
            z-index: 9999; /* Assurez-vous qu'il est au-dessus des autres éléments */
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        @keyframes changeColor {
            0% { border-top-color: #3498db; }
            33% { border-top-color: #e74c3c; }
            66% { border-top-color: #f39c12; }
            100% { border-top-color: #3498db; }
        }

        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.1); }
        }
    </style>
</head>

<body id="body">
    <div id="loading-animation"></div>
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
    <!-- Plugin js pour cette page -->
    <script src="{{ url('vendors/chart.js/Chart.min.js') }}"></script>
    <script src="{{ url('vendors/datatables.net/jquery.dataTables.js') }}"></script>
    <script src="{{ url('vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ url('js/dataTables.select.min.js') }}"></script>
    <!-- Fin plugin js pour cette page -->
    <!-- inject:js -->
    <script src="{{ url('js/off-canvas.js') }}"></script>
    <script src="{{ url('js/hoverable-collapse.js') }}"></script>
    <script src="{{ url('js/template.js') }}"></script>
    <script src="{{ url('js/settings.js') }}"></script>
    <script src="{{ url('js/todolist.js') }}"></script>
    <!-- endinject -->
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const loadingAnimation = document.getElementById('loading-animation');
            
            // Afficher l'animation de chargement lors du chargement initial de la page
            window.addEventListener('load', () => {
                loadingAnimation.style.display = 'none';
                document.body.style.opacity = '1';
            });

            // Afficher l'animation immédiatement au chargement du DOM
            loadingAnimation.style.display = 'block';
            document.body.style.opacity = '0.5';

            // Fonction pour afficher l'animation de chargement
            function showLoadingAnimation() {
                loadingAnimation.style.display = 'block';
                document.body.style.opacity = '0.5';
            }

            // Fonction pour masquer l'animation de chargement
            function hideLoadingAnimation() {
                loadingAnimation.style.display = 'none';
                document.body.style.opacity = '1';
            }

            // Exemple d'utilisation de l'animation de chargement avec une requête AJAX
            document.getElementById('some-button-id').addEventListener('click', function() {
                showLoadingAnimation();
                
                // Simuler un processus long avec un timeout
                setTimeout(() => {
                    // Processus terminé
                    hideLoadingAnimation();
                }, 2000); // Remplacez par votre appel AJAX
            });
        });
    </script>
</body>
</html>
