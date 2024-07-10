<!-- partial:partials/_sidebar.html -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item special-nav-item" id="gestionnaireFiches">
            <a class="nav-link" data-toggle="collapse" aria-expanded="false">
                <span class="menu-title">Gestionnaire des fiches</span>
            </a>
        </li>
        <li class="nav-item" id="vehicule">
            <a class="nav-link" data-toggle="collapse" href="#vehiculeMenu" aria-expanded="false">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    
                <i class="mdi mdi-car" style=""></i>
                <span class="menu-title">&nbsp;&nbsp;&nbsp;&nbsp;Véhicules</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="vehiculeMenu">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('vehicules.index') }}"> Inventaire des véhicules </a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('vehicules.create') }}"> Ajouter un véhicule </a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item" id="sortie">
            <a class="nav-link" data-toggle="collapse" href="#fiche_sortie" aria-expanded="false">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;        
            <i class="mdi mdi-exit-to-app"></i>
                <span class="menu-title">&nbsp;&nbsp;&nbsp;&nbsp;Sorties</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="fiche_sortie">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('sorties.index') }}">Liste des fiches</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('sorties.create') }}">Ajouter</a></li>
                </ul>
            </div>
        </li> 
        <li class="nav-item" id="appvnmt">
            <a class="nav-link" data-toggle="collapse" href="#fiche_appvnmt" aria-expanded="false">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;        
            <i class="mdi mdi-gas-station"></i>
                <span class="menu-title">&nbsp;&nbsp;&nbsp;&nbsp;Approvisionnements</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="fiche_appvnmt">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('approvisionnements.index') }}">Liste des fiches</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('approvisionnements.create') }}">Ajouter</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item" id="maintenance">
            <a class="nav-link" data-toggle="collapse" href="#fiche_maintenance" aria-expanded="false">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;        
            <i class="mdi mdi-wrench "></i>
                <span class="menu-title">&nbsp;&nbsp;&nbsp;&nbsp;Maintenances</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="fiche_maintenance">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('maintenances.index') }}">Liste des fiches</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('maintenances.create') }}">Ajouter</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item" id="magasin">
            <a class="nav-link" data-toggle="collapse" href="#fiche_magasin" aria-expanded="false">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;        
            <i class="mdi mdi-store menu-icon"></i>
                <span class="menu-title">Magasins</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="fiche_magasin">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('magasins.index') }}">Liste des fiches</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('magasins.create') }}">Ajouter</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item" id="achat">
            <a class="nav-link" data-toggle="collapse" href="#demande_achat" aria-expanded="false">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;        
            <i class="mdi mdi-shopping menu-icon"></i>
                <span class="menu-title">Demande d'achat</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="demande_achat">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('achats.index') }}">Liste des fiches</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('achats.create') }}">Ajouter</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item" id="affectation">
            <a class="nav-link" data-toggle="collapse" href="#aut" aria-expanded="false">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;        
            <i class="mdi mdi-share menu-icon"></i>
                <span class="menu-title">Fiche d'affection</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="aut">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('affectations.index') }}">Liste des fiches </a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('affectations.create') }}"> Ajouter </a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;        
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
        <li class="nav-item" id="document">
            <a class="nav-link" data-toggle="collapse" href="#documents" aria-expanded="false">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;        
            <i class="icon-paper menu-icon"></i>
                <span class="menu-title">Documents</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="documents">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('assurances.index') }}"> Assurance </a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('visiteTechniques.index') }}"> Visite technique </a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('tvms.index') }}"> TVM </a></li>
                </ul>
            </div>
        </li>
    </ul>
</nav>

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

                const collapseMenu = link.closest('.collapse');
                if (collapseMenu) {
                    collapseMenu.classList.add('show');
                    collapseMenu.previousElementSibling.setAttribute('aria-expanded', 'true');
                    collapseMenu.closest('.nav-item').classList.add('active');
                }
            }
        });
    });
</script>
