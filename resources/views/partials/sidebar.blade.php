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
                 <span> {{ GoogleTranslate::trans('Statistiques', app()->getLocale()) }}</span>
             </a>
         </li>

         <!-- Nav Item - User Menu -->
         <li class="nav-item">
             <a class="nav-link {{(request()->is('category') || request()->is('category/*') || request()->is('document')|| request()->is('document/*')|| request()->is('categorydon')|| request()->is('categorydon')|| request()->is('courscategory')) ? '' : 'collapsed' }}  " href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                 <i class="fas fa-tags"></i>
                 <span>{{ GoogleTranslate::trans('Catégories', app()->getLocale()) }}</span>
             </a>
             <div id="collapseTwo" class=" {{(request()->is('category') || request()->is('category/*') || request()->is('document')|| request()->is('document/*')|| request()->is('categorydon')|| request()->is('categorydon')|| request()->is('courscategory/*')) ? 'collapse show' : 'collapse' }} " aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                 <div class="bg-white py-2 collapse-inner rounded">
                     <h6 class="collapse-header">{{ GoogleTranslate::trans('Catégories', app()->getLocale()) }}:</h6>
                     <a class="collapse-item" href="{{route('category.index')}}">{{ GoogleTranslate::trans('Activités', app()->getLocale()) }}</a>
                     <a class="collapse-item " href="{{route('document.index')}}">{{ GoogleTranslate::trans('Livre', app()->getLocale()) }}</a>
                     <a class="collapse-item " href="{{route('categorydon.index')}}">{{ GoogleTranslate::trans('Dons', app()->getLocale()) }}</a>
                     <a class="collapse-item " href="{{route('categoriactualite.index')}}">{{ GoogleTranslate::trans('Publication', app()->getLocale()) }}</a>
                     <a class="collapse-item " href="{{route('courscategory.index')}}">{{ GoogleTranslate::trans('Cours', app()->getLocale()) }}</a>

                 </div>
             </div>
         </li>

         <li class="nav-item">
             <a class="nav-link {{(request()->is('book') || request()->is('book/*') ) ? '' : 'collapsed' }}  " href="#" data-toggle="collapse" data-target="#collapse2" aria-expanded="true" aria-controls="collapse2">
                 <i class="fas fa-book"></i>
                 <span>{{ GoogleTranslate::trans('Livres', app()->getLocale()) }}</span>
             </a>
             <div id="collapse2" class="{{(request()->is('book') || request()->is('book/*')) ? 'collapse show' : 'collapse' }} " aria-labelledby="heading2" data-parent="#accordionSidebar">
                 <div class="bg-white py-2 collapse-inner rounded">
                     <h6 class="collapse-header">{{ GoogleTranslate::trans('Livres', app()->getLocale()) }}:</h6>
                     @if (Auth::user()->role == 1 || Auth::user()->role == 3)
                     <a class="collapse-item" href="{{route('book.create')}}">{{ GoogleTranslate::trans('Nouveau livre', app()->getLocale()) }}</a>
                     @endif
                     <a class="collapse-item " href="{{route('book.index')}}">{{ GoogleTranslate::trans('Bibliothèque', app()->getLocale()) }}</a>
                 </div>
             </div>
         </li>

         <li class="nav-item">
             <a class="nav-link {{(request()->is('activity') || request()->is('activity/*') ) ? '' : 'collapsed' }} " href="#" data-toggle="collapse" data-target="#collapse3" aria-expanded="true" aria-controls="collapse3">
                 <i class="fas fa-square"></i>
                 <span>{{ GoogleTranslate::trans('Activités', app()->getLocale()) }}</span>
             </a>
             <div id="collapse3" class="{{(request()->is('activity') || request()->is('activity/*')) ? 'collapse show' : 'collapse' }}" aria-labelledby="heading3" data-parent="#accordionSidebar">
                 <div class="bg-white py-2 collapse-inner rounded">
                     <h6 class="collapse-header">{{ GoogleTranslate::trans('Activités', app()->getLocale()) }}:</h6>
                     @if (Auth::user()->role == 1 || Auth::user()->role == 3)
                     <a class="collapse-item" href="{{route('activity.create')}}">{{ GoogleTranslate::trans('Nouvelle activité', app()->getLocale()) }}</a>
                     @endif
                     <a class="collapse-item " href="{{route('activity.index')}}">{{ GoogleTranslate::trans('Liste des activités', app()->getLocale()) }}</a>
                 </div>
             </div>
         </li>

         <li class="nav-item">
             <a class="nav-link {{(request()->is('formation') || request()->is('formation/*') ) ? '' : 'collapsed' }} " href="#" data-toggle="collapse" data-target="#collapse4" aria-expanded="true" aria-controls="collapse4">
                 <i class="fas fa-archive"></i>
                 <span>{{ GoogleTranslate::trans('Agenda de Formations', app()->getLocale()) }}</span>
             </a>
             <div id="collapse4" class="{{(request()->is('formation') || request()->is('formation/*')) ? 'collapse show' : 'collapse' }}" aria-labelledby="heading4" data-parent="#accordionSidebar">
                 <div class="bg-white py-2 collapse-inner rounded">
                     <h6 class="collapse-header">{{ GoogleTranslate::trans('Agenda de Formations', app()->getLocale()) }}:</h6>
                     @if (Auth::user()->role == 1 || Auth::user()->role == 3)
                     <a class="collapse-item" href="{{route('formation.create')}}">{{ GoogleTranslate::trans('Nouvelle formation', app()->getLocale()) }}</a>
                     @endif
                     <a class="collapse-item " href="{{route('formation.index')}}">{{ GoogleTranslate::trans('Liste des formations', app()->getLocale()) }}</a>
                 </div>
             </div>
         </li>

         <li class="nav-item">
             <a class="nav-link {{(request()->is('new') || request()->is('new/*') ) ? '' : 'collapsed' }} " href="#" data-toggle="collapse" data-target="#collapse5" aria-expanded="true" aria-controls="collapse5">
                 <i class="fas fa-reply-all"></i>
                 <span>{{ GoogleTranslate::trans('Publication', app()->getLocale()) }}</span>
             </a>
             <div id="collapse5" class="{{(request()->is('new') || request()->is('new/*')) ? 'collapse show' : 'collapse' }}" aria-labelledby="heading5" data-parent="#accordionSidebar">
                 <div class="bg-white py-2 collapse-inner rounded">
                     <h6 class="collapse-header">{{ GoogleTranslate::trans('Publication', app()->getLocale()) }}:</h6>
                     @if (Auth::user()->role == 1 || Auth::user()->role == 3)
                     <a class="collapse-item" href="{{route('new.create')}}">{{ GoogleTranslate::trans('Nouvelle Publication', app()->getLocale()) }}</a>
                     @endif
                     <a class="collapse-item " href="{{route('new.index')}}">{{ GoogleTranslate::trans('Liste des publications', app()->getLocale()) }}</a>
                 </div>
             </div>
         </li>
         <li class="nav-item">
             <a class="nav-link {{( request()->is('don/*') ) ? '' : 'collapsed' }} " href="#" data-toggle="collapse" data-target="#collapse8" aria-expanded="true" aria-controls="collapse8">
                 <i class="fas fa-gift"></i>
                 <span>{{ GoogleTranslate::trans('Dons', app()->getLocale()) }}</span>
             </a>
             <div id="collapse8" class="{{( request()->is('don/*')) ? 'collapse show' : 'collapse' }}" aria-labelledby="heading8" data-parent="#accordionSidebar">
                 <div class="bg-white py-2 collapse-inner rounded">
                     <h6 class="collapse-header">{{ GoogleTranslate::trans('Dons', app()->getLocale()) }}:</h6>
                     <a class="collapse-item " href="{{route('don.index')}}">{{ GoogleTranslate::trans('Dons en reçu', app()->getLocale()) }}</a>

                 </div>
             </div>
         </li>

         <li class="nav-item">
             <a class="nav-link {{( request()->is('recrutement/*') || request()->is('benevolat/*') ) ? '' : 'collapsed' }} " href="#" data-toggle="collapse" data-target="#collapse10" aria-expanded="true" aria-controls="collapse10">
                 <i class="fas  fa-align-justify"></i>
                 <span>{{ GoogleTranslate::trans('Recrutement', app()->getLocale()) }}</span>
             </a>
             <div id="collapse10" class="{{( request()->is('recrutement/*') || request()->is('benevolat/*')) ? 'collapse show' : 'collapse' }}" aria-labelledby="heading10" data-parent="#accordionSidebar">
                 <div class="bg-white py-2 collapse-inner rounded">
                     <h6 class="collapse-header">{{ GoogleTranslate::trans('Recrutement', app()->getLocale()) }}:</h6>
                     @if (Auth::user()->role == 1 || Auth::user()->role == 3)
                     <a class="collapse-item" href="{{route('recrutement.index')}}">{{ GoogleTranslate::trans('Recrutement', app()->getLocale()) }}</a>
                     @endif
                     <a class="collapse-item " href="{{route('benevolat')}}">{{ GoogleTranslate::trans('Bénévolat', app()->getLocale()) }}</a>
                 </div>
             </div>
         </li>

         @if (Auth::user()->role == 1 || Auth::user()->role == 3 )
         <li class="nav-item">
             <a class="nav-link {{(request()->is('cours') || request()->is('cours/*')) ? '' : 'collapsed' }} " href="#" data-toggle="collapse" data-target="#collapse7" aria-expanded="true" aria-controls="collapse7">
                 <i class="fas fa-envelope"></i>
                 <span>{{ GoogleTranslate::trans('Cours', app()->getLocale()) }}</span>
             </a>
             <div id="collapse7" class="{{(request()->is('cours') || request()->is('cours/*')) ? 'collapse show' : 'collapse' }}" aria-labelledby="heading7" data-parent="#accordionSidebar">
                 <div class="bg-white py-2 collapse-inner rounded">
                     <h6 class="collapse-header">{{ GoogleTranslate::trans('Cours', app()->getLocale()) }}:</h6>
                     <a class="collapse-item" href="{{route('cours.create')}}">{{ GoogleTranslate::trans('Créer un cours', app()->getLocale()) }}</a>
                     <a class="collapse-item " href="{{route('cours.index')}}">{{ GoogleTranslate::trans('Les cours', app()->getLocale()) }}</a>
                 </div>
             </div>
         </li>
         @endif

         @if (Auth::user()->role == 1 || Auth::user()->role == 3 )
         <li class="nav-item">
             <a class="nav-link {{(request()->is('message') || request()->is('message/*') || request()->is('newslatter/*') || request()->is('alert/*')) ? '' : 'collapsed' }} " href="#" data-toggle="collapse" data-target="#collapses" aria-expanded="true" aria-controls="collapses">
                 <i class="fas fa-envelope"></i>
                 <span>{{ GoogleTranslate::trans('Message/E-mail/Alert', app()->getLocale()) }}</span>
             </a>
             <div id="collapses" class="{{(request()->is('message') || request()->is('message/*') || request()->is('newslatter/*') || request()->is('alert/*')) ? 'collapse show' : 'collapse' }}" aria-labelledby="headings" data-parent="#accordionSidebar">
                 <div class="bg-white py-2 collapse-inner rounded">
                     <h6 class="collapse-header">{{ GoogleTranslate::trans('Message/E-mail', app()->getLocale()) }}:</h6>
                     <a class="collapse-item" href="{{route('message')}}">{{ GoogleTranslate::trans('Méssage', app()->getLocale()) }}</a>
                     <a class="collapse-item " href="{{route('email')}}">{{ GoogleTranslate::trans('E-mail', app()->getLocale()) }}</a>
                     <a class="collapse-item " href="{{route('alert.index')}}">{{ GoogleTranslate::trans('Alert', app()->getLocale()) }}</a>
                 </div>
             </div>
         </li>
         @endif
         @if (Auth::user()->role == 1 )
         <li class="nav-item">
             <a class="nav-link {{(request()->is('user') || request()->is('user/*') ) ? '' : 'collapsed' }} " href="#" data-toggle="collapse" data-target="#collapse6" aria-expanded="true" aria-controls="collapse6">
                 <i class="fas fa-users"></i>
                 <span>{{ GoogleTranslate::trans('Utilisateurs', app()->getLocale()) }}</span>
             </a>
             <div id="collapse6" class="{{(request()->is('user') || request()->is('user/*')) ? 'collapse show' : 'collapse' }}" aria-labelledby="heading6" data-parent="#accordionSidebar">
                 <div class="bg-white py-2 collapse-inner rounded">
                     <h6 class="collapse-header">{{ GoogleTranslate::trans('Utilisateurs', app()->getLocale()) }}:</h6>

                     <a class="collapse-item" href="{{route('user.create')}}">{{ GoogleTranslate::trans('Nouveau utilisateur', app()->getLocale()) }}</a>

                     <a class="collapse-item " href="{{route('user.index')}}">{{ GoogleTranslate::trans('Liste des utilisateurs', app()->getLocale()) }}</a>
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
