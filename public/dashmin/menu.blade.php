<div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-nav navbar-light">
                <a href="#" class="navbar-brand mx-4 mb-3">
                    <h4 class="text-primary"><img src="{{asset('frontend/img/logo3.jpeg')}}" width="150" height="100" alt=""></h4>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="{{asset('dashmin/img/user.jpg')}}" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0">{{Auth::user()->prenom}} {{Auth::user()->name}}</h6>
                        <span>Role</span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="{{route('dashboard')}}" class="nav-item nav-link {{ Request::routeIs('dashboard') ? 'active' : '' }}"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    <a href="{{route('categorie.index')}}" class="nav-item nav-link {{ Request::routeIs('categorie.index') ? 'active' : '' }}"><i class="fas fa-user-tie me-2"></i>Catégories</a>
                    <a href="{{route('contenu.index')}}" class="nav-item nav-link {{ Request::routeIs('contenu.index') ? 'active' : '' }}"><i class="fas fa-user-tie me-2"></i>Contenus</a>
                    <a href="{{route('produit.index')}}" class="nav-item nav-link {{ Request::routeIs('produit.index') ? 'active' : '' }}"><i class="fas fa-user-tie me-2"></i>Produits</a>
                    <div class="nav-item dropdown requete" id="menu-requete">
                        <a href="#" class="nav-link dropdown-toggle" id="menu-requete" data-bs-toggle="dropdown"><i class="fa fa-cogs me-2"></i>Requete</a>
                        <div class="dropdown-menu subrequete bg-transparent border-0">
                            <a href="{{route('requete.index')}}" id="" class="dropdown-item {{ Request::routeIs('requete.index') ? 'active' : '' }}">Liste</a>
                            <a href="#" id="link-role" class="dropdown-item {{ Request::routeIs('role.index') ? 'active' : '' }}">Reponse</a>                                                       
                        </div>
                    </div>
                    <!-- <a href="" class="nav-item nav-link {{ Request::routeIs('requete.index') ? 'active' : '' }}"><i class="fas fa-user-tie me-2"></i>Requetes</a> -->
                    <!-- <a href="#" class="nav-item nav-link {{ Request::routeIs('employe.index') ? 'active' : '' }}"><i class="fas fa-user-tie me-2"></i>Employe</a> -->
                    <div class="nav-item dropdown admin" id="menu-admin">
                        <a href="#" class="nav-link dropdown-toggle" id="menu-admin" data-bs-toggle="dropdown"><i class="fa fa-cogs me-2"></i>Administration</a>
                        <div class="dropdown-menu subadmin bg-transparent border-0">
                            <a href="#" id="link-user" class="dropdown-item {{ Request::routeIs('user.index') ? 'active' : '' }}">Utilisateurs</a>
                            <a href="#" id="link-role" class="dropdown-item {{ Request::routeIs('role.index') ? 'active' : '' }}">Rôles</a>
                            <a href="#" id="link-permission" class="dropdown-item {{ Request::routeIs('permissions.index') ? 'active' : '' }}">Permissions</a>
                            <a href="{{route('parametre.index')}}" id="link-parametre" class="dropdown-item {{ Request::routeIs('parametre.index') ? 'active' : '' }}">Parametres</a>
                            <a href="{{route('valeur.index')}}" id="link-valeur" class="dropdown-item {{ Request::routeIs('valeur.index') ? 'active' : '' }}">Valeurs</a>                            
                        </div>
                    </div>
                </div>
            </nav>
        </div>