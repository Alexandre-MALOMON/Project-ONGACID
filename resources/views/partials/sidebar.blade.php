 <!-- Sidebar -->
 <div id="wrapper">
     <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
         <!-- Sidebar - Brand -->
         <li>
             <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
                 <div class="sidebar-brand-icon rotate-n-15">
                     <!-- <i class="fas fa-laugh-wink"></i> -->
                     <img src="{{ asset('images/acid.jpeg')}}" heigth="70px" width="70px" alt="">
                 </div>
                 <div class="sidebar-brand-text mx-3">ONG ACID </div>
             </a>
         </li>
         <!-- Divider -->
         <hr class="sidebar-divider my-0">

         <!-- Nav Item - Dashboard -->
         <li class="nav-item ">
             <a class="nav-link" href="">
                 <i class="fas fa-fw fa-tachometer-alt"></i>
                 <span> Statistiques</span>
             </a>
         </li>

         <!-- Nav Item - User Menu -->
         <li class="nav-item">
             <a class="nav-link {{(request()->is('category') || request()->is('category/*') || request()->is('document')|| request()->is('document/*')|| request()->is('categorydon')|| request()->is('categorydon')|| request()->is('courscategory')) ? '' : 'collapsed' }}  " href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                 <i class="fas fa-tags"></i>
                 <span>Catégories</span>
             </a>
             <div id="collapseTwo" class=" {{(request()->is('category') || request()->is('category/*') || request()->is('document')|| request()->is('document/*')|| request()->is('categorydon')|| request()->is('categorydon')|| request()->is('courscategory/*')) ? 'collapse show' : 'collapse' }} " aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                 <div class="bg-white py-2 collapse-inner rounded">
                     <h6 class="collapse-header">Catégories:</h6>
                     <a class="collapse-item" href="{{route('category.index')}}">Activités</a>
                     <a class="collapse-item " href="{{route('document.index')}}">Livre</a>
                     <a class="collapse-item " href="{{route('categorydon.index')}}">Dons</a>
                     <a class="collapse-item " href="{{route('categoriactualite.index')}}">Publication</a>
                     <a class="collapse-item " href="{{route('courscategory.index')}}">Cours</a>

                 </div>
             </div>
         </li>

         <li class="nav-item">
             <a class="nav-link {{(request()->is('book') || request()->is('book/*') ) ? '' : 'collapsed' }}  " href="#" data-toggle="collapse" data-target="#collapse2" aria-expanded="true" aria-controls="collapse2">
                 <i class="fas fa-book"></i>
                 <span>Livres</span>
             </a>
             <div id="collapse2" class="{{(request()->is('book') || request()->is('book/*')) ? 'collapse show' : 'collapse' }} " aria-labelledby="heading2" data-parent="#accordionSidebar">
                 <div class="bg-white py-2 collapse-inner rounded">
                     <h6 class="collapse-header">Livres:</h6>
                     @if (Auth::user()->role == 1 || Auth::user()->role == 3)
                     <a class="collapse-item" href="{{route('book.create')}}">Nouveau livre</a>
                     @endif
                     <a class="collapse-item " href="{{route('book.index')}}">Bibliothèque</a>
                 </div>
             </div>
         </li>

         <li class="nav-item">
             <a class="nav-link {{(request()->is('activity') || request()->is('activity/*') ) ? '' : 'collapsed' }} " href="#" data-toggle="collapse" data-target="#collapse3" aria-expanded="true" aria-controls="collapse3">
                 <i class="fas fa-square"></i>
                 <span>Activités</span>
             </a>
             <div id="collapse3" class="{{(request()->is('activity') || request()->is('activity/*')) ? 'collapse show' : 'collapse' }}" aria-labelledby="heading3" data-parent="#accordionSidebar">
                 <div class="bg-white py-2 collapse-inner rounded">
                     <h6 class="collapse-header">Activités:</h6>
                     @if (Auth::user()->role == 1 || Auth::user()->role == 3)
                     <a class="collapse-item" href="{{route('activity.create')}}">Nouvelle activité</a>
                     @endif
                     <a class="collapse-item " href="{{route('activity.index')}}">Liste des activités</a>
                 </div>
             </div>
         </li>

         <li class="nav-item">
             <a class="nav-link {{(request()->is('formation') || request()->is('formation/*') ) ? '' : 'collapsed' }} " href="#" data-toggle="collapse" data-target="#collapse4" aria-expanded="true" aria-controls="collapse4">
                 <i class="fas fa-archive"></i>
                 <span>Agenda de Formations</span>
             </a>
             <div id="collapse4" class="{{(request()->is('formation') || request()->is('formation/*')) ? 'collapse show' : 'collapse' }}" aria-labelledby="heading4" data-parent="#accordionSidebar">
                 <div class="bg-white py-2 collapse-inner rounded">
                     <h6 class="collapse-header">Agenda de Formations:</h6>
                     @if (Auth::user()->role == 1 || Auth::user()->role == 3)
                     <a class="collapse-item" href="{{route('formation.create')}}">Nouvelle formation</a>
                     @endif
                     <a class="collapse-item " href="{{route('formation.index')}}">Liste des formations</a>
                 </div>
             </div>
         </li>

         <li class="nav-item">
             <a class="nav-link {{(request()->is('new') || request()->is('new/*') ) ? '' : 'collapsed' }} " href="#" data-toggle="collapse" data-target="#collapse5" aria-expanded="true" aria-controls="collapse5">
                 <i class="fas fa-reply-all"></i>
                 <span>Publication</span>
             </a>
             <div id="collapse5" class="{{(request()->is('new') || request()->is('new/*')) ? 'collapse show' : 'collapse' }}" aria-labelledby="heading5" data-parent="#accordionSidebar">
                 <div class="bg-white py-2 collapse-inner rounded">
                     <h6 class="collapse-header">Publication:</h6>
                     @if (Auth::user()->role == 1 || Auth::user()->role == 3)
                     <a class="collapse-item" href="{{route('new.create')}}">Nouvelle Publication</a>
                     @endif
                     <a class="collapse-item " href="{{route('new.index')}}">Liste des publications</a>
                 </div>
             </div>
         </li>
         <li class="nav-item">
             <a class="nav-link {{( request()->is('don/*') ) ? '' : 'collapsed' }} " href="#" data-toggle="collapse" data-target="#collapse8" aria-expanded="true" aria-controls="collapse8">
                 <i class="fas fa-gift"></i>
                 <span>Dons</span>
             </a>
             <div id="collapse8" class="{{( request()->is('don/*')) ? 'collapse show' : 'collapse' }}" aria-labelledby="heading8" data-parent="#accordionSidebar">
                 <div class="bg-white py-2 collapse-inner rounded">
                     <h6 class="collapse-header">Dons:</h6>
                     <a class="collapse-item " href="{{route('don.index')}}">Dons en reçu</a>

                 </div>
             </div>
         </li>

         <li class="nav-item">
             <a class="nav-link {{( request()->is('recrutement/*') || request()->is('benevolat/*') ) ? '' : 'collapsed' }} " href="#" data-toggle="collapse" data-target="#collapse10" aria-expanded="true" aria-controls="collapse10">
                 <i class="fas  fa-align-justify"></i>
                 <span>Recrutement</span>
             </a>
             <div id="collapse10" class="{{( request()->is('recrutement/*') || request()->is('benevolat/*')) ? 'collapse show' : 'collapse' }}" aria-labelledby="heading10" data-parent="#accordionSidebar">
                 <div class="bg-white py-2 collapse-inner rounded">
                     <h6 class="collapse-header">Recrutement:</h6>
                     @if (Auth::user()->role == 1 || Auth::user()->role == 3)
                     <a class="collapse-item" href="{{route('recrutement.index')}}">Recrutement</a>
                     @endif
                     <a class="collapse-item " href="{{route('benevolat')}}">Bénévolat</a>
                 </div>
             </div>
         </li>

         @if (Auth::user()->role == 1 || Auth::user()->role == 3 )
         <li class="nav-item">
             <a class="nav-link {{(request()->is('cours') || request()->is('cours/*')) ? '' : 'collapsed' }} " href="#" data-toggle="collapse" data-target="#collapse7" aria-expanded="true" aria-controls="collapse7">
                 <i class="fas fa-envelope"></i>
                 <span>Cours</span>
             </a>
             <div id="collapse7" class="{{(request()->is('cours') || request()->is('cours/*')) ? 'collapse show' : 'collapse' }}" aria-labelledby="heading7" data-parent="#accordionSidebar">
                 <div class="bg-white py-2 collapse-inner rounded">
                     <h6 class="collapse-header">Cours:</h6>
                     <a class="collapse-item" href="{{route('cours.create')}}">Créer un cours</a>
                     <a class="collapse-item " href="{{route('cours.index')}}">Les cours</a>
                 </div>
             </div>
         </li>
         @endif

         @if (Auth::user()->role == 1 || Auth::user()->role == 3 )
         <li class="nav-item">
             <a class="nav-link {{(request()->is('message') || request()->is('message/*') || request()->is('newslatter/*') || request()->is('alert/*')) ? '' : 'collapsed' }} " href="#" data-toggle="collapse" data-target="#collapses" aria-expanded="true" aria-controls="collapses">
                 <i class="fas fa-envelope"></i>
                 <span>Message/E-mail/Alert</span>
             </a>
             <div id="collapses" class="{{(request()->is('message') || request()->is('message/*') || request()->is('newslatter/*') || request()->is('alert/*')) ? 'collapse show' : 'collapse' }}" aria-labelledby="headings" data-parent="#accordionSidebar">
                 <div class="bg-white py-2 collapse-inner rounded">
                     <h6 class="collapse-header">Message/E-mail:</h6>
                     <a class="collapse-item" href="{{route('message')}}">Méssage</a>
                     <a class="collapse-item " href="{{route('email')}}">E-mail</a>
                     <a class="collapse-item " href="{{route('alert.index')}}">Alert</a>
                 </div>
             </div>
         </li>
         @endif
         @if (Auth::user()->role == 1 )
         <li class="nav-item">
             <a class="nav-link {{(request()->is('user') || request()->is('user/*') ) ? '' : 'collapsed' }} " href="#" data-toggle="collapse" data-target="#collapse6" aria-expanded="true" aria-controls="collapse6">
                 <i class="fas fa-users"></i>
                 <span>Utilisateurs</span>
             </a>
             <div id="collapse6" class="{{(request()->is('user') || request()->is('user/*')) ? 'collapse show' : 'collapse' }}" aria-labelledby="heading6" data-parent="#accordionSidebar">
                 <div class="bg-white py-2 collapse-inner rounded">
                     <h6 class="collapse-header">Utilisateurs:</h6>

                     <a class="collapse-item" href="{{route('user.create')}}">Nouveau utilisateur</a>

                     <a class="collapse-item " href="{{route('user.index')}}">Liste des utilisateurs</a>
                 </div>
             </div>
         </li>
         @endif


         <!-- Divider -->
         <hr class="sidebar-divider">

         <div class="text-center d-none d-md-inline">
             <button class="rounded-circle border-0" id="sidebarToggle"></button>
         </div>
     </ul>
 </div>
