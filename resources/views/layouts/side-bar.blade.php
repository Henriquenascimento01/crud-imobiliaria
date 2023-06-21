 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
     <!-- Brand Logo -->
     {{-- <a href="/" class="brand-link text-center">
         <img src="{{ asset('img/simbolo.png') }}" alt="ProDiesel | Admin" class="img-fluid" style="opacity: .8"
             width="50px">
     </a> --}}
     <!-- Sidebar -->
     <div class="sidebar">
         <nav class="mt-2">
             <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                 <li class="nav-item">
                     <a href="{{ route('home') }}" class="nav-link">
                         <p>
                             Página inicial
                         </p>
                     </a>
                 </li>
                 {{-- Clientes --}}
                 <li class="nav-item">
                     <a href="#" class="nav-link">
                         <p>
                             Clientes
                             <i class="right fas fa-angle-left"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         <li class="nav-item">
                             <a href="{{ route('customer.create') }}" class="nav-link">
                                 <i class="fas fa-user-plus nav-icon"></i>
                                 <p>Cadastrar</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="{{ route('customers.index') }}" class="nav-link">
                                 <i class="fas fa-users nav-icon"></i>
                                 <p>Ver todos</p>
                             </a>
                         </li>
                     </ul>
                 </li>
                 {{-- Imóveis --}}
                 <li class="nav-item">
                     <a href="#" class="nav-link">
                         <p>
                             Imóveis
                             <i class="right fas fa-angle-left"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         <li class="nav-item">
                             <a href="{{ route('property.create') }}" class="nav-link">
                                 <i class="fas fa-user-plus nav-icon"></i>
                                 <p>Cadastrar</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="{{ route('properties.index') }}" class="nav-link">
                                 <i class="fas fa-list nav-icon"></i>
                                 <p>Ver todos</p>
                             </a>
                         </li>
                     </ul>
                 </li>
                 <li class="nav-item">
                     <a href="#" class="nav-link" href="{{ route('logout') }}"
                         onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                         <i class="fas fa-sign-out-alt"></i>
                         <p>Sair</p>
                     </a>
                     <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                         @csrf
                     </form>
                 </li>
             </ul>
         </nav>
         <!-- /.sidebar-menu -->
     </div>
     <!-- /.sidebar -->
 </aside>
