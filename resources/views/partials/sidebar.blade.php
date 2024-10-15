<aside class="left-sidebar" data-sidebarbg="skin6">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <!-- User Profile-->
                <li class="sidebar-item pt-2">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('dashboard')}}"
                        aria-expanded="false">
                        <i class="fas fa-tachometer-alt" aria-hidden="true"></i>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('postes.index')}}"
                        aria-expanded="false">
                        <i class="fas fa-briefcase" aria-hidden="true"></i>
                        <span class="hide-menu">Gestion des postes</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('type_contrats.index')}}"
                        aria-expanded="false">
                        <i class="fas fa-folder-open" aria-hidden="true"></i>
                        <span class="hide-menu">Gestion des types de contrat</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('employes.index')}}"
                        aria-expanded="false">
                        <i class="fas fa-users" aria-hidden="true"></i>
                        <span class="hide-menu">Gestion des employés</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('contrats.index')}}"
                        aria-expanded="false">
                        <i class="fas fa-file-alt" aria-hidden="true"></i>
                        <span class="hide-menu">Gestion des contrats</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('occuper.index')}}"
                        aria-expanded="false">
                        <i class="fas fa-tasks" aria-hidden="true"></i>
                        <span class="hide-menu">Gestion des assignations</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('departements.index')}}"
                        aria-expanded="false">
                        <i class="fas fa-sitemap" aria-hidden="true"></i>
                        <span class="hide-menu">Gestion des départements</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('permissions.index')}}"
                        aria-expanded="false">
                        <i class="fas fa-key" aria-hidden="true"></i>
                        <span class="hide-menu">Gestion des permissions</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('salary.index')}}"
                        aria-expanded="false">
                        <i class="fas fa-key" aria-hidden="true"></i>
                        <span class="hide-menu">Gestion des salaires</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('presences.index')}}"
                        aria-expanded="false">
                        <i class="fas fa-calendar-check" aria-hidden="true"></i>
                        <span class="hide-menu">Gestion des présences</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('enregistrers.index')}}"
                        aria-expanded="false">
                        <i class="fas fa-clock" aria-hidden="true"></i>
                        <span class="hide-menu">Enregistrer présence</span>
                    </a>
                </li>

                <li class="text-center p-20 upgrade-btn">
                    <a href="{{asset('dashboard-asset/https://www.wrappixel.com/templates/ampleadmin/')}}"
                        class="btn d-grid btn-primary text-white" target="_blank">
                        Se déconnecter</a>
                </li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
