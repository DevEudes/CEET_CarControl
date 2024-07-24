<!-- partial:partials/_sidebar.html -->
<nav class="sidebar sidebar-offcanvas">
    <ul class="nav">
        <li class="nav-item special-nav-item" id="gestionnaireFiches">
            <a class="nav-link" href="{{ url('/dashboard') }}">
                <span class="menu-title">Tableau De Bord</span>
            </a>
        </li>
        <li class="nav-item" id="utilisateur">
            <a class="nav-link" data-toggle="collapse" href="#utilisateurs" aria-expanded="false">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                <i class="mdi mdi-account menu-icon"></i>
                <span class="menu-title">Utilisateurs</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="utilisateurs">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route("utilisateurs.index") }}"> Liste des utilisateurs </a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route("utilisateurs.create") }}"> Ajouter un Utilisateur </a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item" id="carte_carburant">
            <a class="nav-link" data-toggle="collapse" href="#carte_carburants" aria-expanded="false">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                <i class="mdi mdi-credit-card menu-icon"></i>
                <span class="menu-title">Cartes de Carburant</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="carte_carburants">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="#">Liste des cartes</a></li>
                    <li class="nav-item"> <a class="nav-link" href="#">Ajouter une carte</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item" id="fiche">
            <a class="nav-link" data-toggle="collapse" href="#fiches" aria-expanded="false">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                <i class="mdi mdi-file menu-icon"></i>
                <span class="menu-title">Fiches</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="fiches">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="#">Maintenances</a></li>
                    <li class="nav-item"> <a class="nav-link" href="#">Sorties</a></li>
                    <li class="nav-item"> <a class="nav-link" href="#">Approvisionnements</a></li>
                    <li class="nav-item"> <a class="nav-link" href="#">Magasins</a></li>
                    <li class="nav-item"> <a class="nav-link" href="#">Achats</a></li>
                    <li class="nav-item"> <a class="nav-link" href="#">Affectations</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item" id="vehicule">
            <a class="nav-link" data-toggle="collapse" href="#vehicules" aria-expanded="false">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                <i class="mdi mdi-car menu-icon"></i>
                <span class="menu-title">Véhicules</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="vehicules">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="#">Gérer les véhicules</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item" href="piece">
            <a class="nav-link" data-toggle="collapse" href="#pieces" aria-expanded="false">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                <i class="mdi mdi-engine-outline menu-icon"></i>
                <span class="menu-title">Pièces</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="pieces">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="#">Gérer les pièces</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item" href="role">
            <a class="nav-link" data-toggle="collapse" href="#roles" aria-expanded="false">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                <i class="mdi mdi-account-convert menu-icon"></i>
                <span class="menu-title">Roles</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="roles">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="#">Gérer les roles</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item" href="etablissement">
            <a class="nav-link" data-toggle="collapse" href="#etablissements" aria-expanded="false">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                <i class="mdi mdi-home-modern menu-icon"></i>
                <span class="menu-title">Etablissements</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="etablissements">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" hr ef="#">Gérer les établissements</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item" id="statistique">
            <a class="nav-link" data-toggle="collapse" href="#statistiques" aria-expanded="false">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                <i class="mdi mdi-chart-line menu-icon"></i>
                <span class="menu-title">Statistiques</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="statistiques">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="#">Flux des véhicules</a></li>
                    <li class="nav-item"> <a class="nav-link" href="#">Flux des sorties</a></li>
                    <li class="nav-item"> <a class="nav-link" href="#">Flux de consomations</a></li>
                    <li class="nav-item"> <a class="nav-link" href="#">Flux des réparations</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item" id="document">
            <a class="nav-link" data-toggle="collapse" href="#documents" aria-expanded="false">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <i class="mdi mdi-file menu-icon"></i>
                <span class="menu-title">Documents</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="documents">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="#"> Assurance </a></li>
                    <li class="nav-item"> <a class="nav-link" href="#"> Visite technique </a></li>
                    <li class="nav-item"> <a class="nav-link" href="#"> TVM </a></li>
                </ul>
            </div>
        </li>
    </ul>
</nav>

<!-- plugins:js -->
<script src="{{ url('vendors/js/vendor.bundle.base.js') }}"></script>
<!-- endinject -->

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Rendre le gestionnaire de fiches toujours actif
        const gestionnaireFiches = document.getElementById('gestionnaireFiches');
        gestionnaireFiches.classList.add('active');
        gestionnaireFiches.style.backgroundColor = '#ef1212';
        gestionnaireFiches.style.color = '#fff';

        // Mettre en surbrillance le menu actif en fonction de l'URL actuelle
        const currentUrl = window.location.href;
        const navLinks = document.querySelectorAll('.nav-link');

        navLinks.forEach(function(link) {
            if (link.href === currentUrl) {
                const navItem = link.closest('.nav-item');
                navItem.classList.add('active');

                const collapseMenu = link.nextElementSibling;
                if (collapseMenu && collapseMenu.classList.contains('collapse')) {
                    collapseMenu.classList.add('show');
                    link.setAttribute('aria-expanded', 'true');
                }
            }
        });
    });
</script>
