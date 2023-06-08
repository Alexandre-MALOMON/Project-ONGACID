<div class="container_header">
    <div class="icone_groups">
        <a href="#">
            <span><i class="fa-brands fa-facebook"></i></span>
        </a>
        <a href="#">
            <span><i class="fa-brands fa-instagram"></i></span>
        </a>
        <a href="#">
            <span><i class="fa-brands fa-twitter"></i></span>
        </a>
        <a href="#">
            <span><i class="fa-brands fa-youtube"></i></span>
        </a>
    </div>
    <div class="link_group">
        <a class="link close_button" href="#">{{GoogleTranslate::trans('Faire un don', app()->getLocale())}}</a>
        <a class="link_active" href="{{ route('alert')}}">{{GoogleTranslate::trans('Alerte', app()->getLocale())}}</a>
    </div>
</div>
@include('home.modaldon')
<nav class="navbar navbar-expand-lg container_navbar">
    <div class="container-fluid container_nav">

        <div class="logo">
            <a class="" href="/">
                <img src="{{ asset('images/logo.png') }}" heigth="70px" width="70px" alt="">
            </a>
        </div>

        <ul class="navbar-nav navbar-nav-scroll ">
            <li class="nav-item dropdown first_link">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    {{GoogleTranslate::trans('Nos activités', app()->getLocale())}}
                </a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-lg-start">
                    @foreach (categotyActivity() as $categotyAct)
                    <li><a class="dropdown-item" href="{{ route('activite')}}?activite={{Crypt::encrypt($categotyAct->id)}}"> {{GoogleTranslate::trans( $categotyAct->name , app()->getLocale())}}</a></li>
                    @endforeach
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link" href="{{ route('courses.index')}}">{{ GoogleTranslate::trans("Nos formations", app()->getLocale()) }}</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    {{GoogleTranslate::trans('Bibliothèque', app()->getLocale())}}
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="{{ route('categoriebiblio')}}"> {{GoogleTranslate::trans('Payant', app()->getLocale())}}</a></li>
                    <li><a class="dropdown-item" href="{{ route('bibliotheque')}}">{{GoogleTranslate::trans( 'Gratuit', app()->getLocale())}}</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    {{GoogleTranslate::trans('Nos partenaires', app()->getLocale())}}

                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="{{ route('partenairelocaux')}}">{{GoogleTranslate::trans('Locaux', app()->getLocale())}}</a></li>
                    <li><a class="dropdown-item" href="{{ route('partenaireinternationaux')}}">{{GoogleTranslate::trans('Internationnaux', app()->getLocale())}}</a></li>
                    <li><a class="dropdown-item" href="#">{{GoogleTranslate::trans('Etre partenaire', app()->getLocale())}}</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    {{GoogleTranslate::trans('Notre actualité', app()->getLocale())}}
                </a>
                <ul class="dropdown-menu">
                    @foreach (categotypost() as $new)
                    <li><a class="dropdown-item" href="{{ route('actualite')}}?actualite={{Crypt::encrypt($new->id)}}">{{GoogleTranslate::trans($new->name, app()->getLocale())}}</a></li>
                    @endforeach
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('agenda')}}">{{GoogleTranslate::trans('Agenda de formations', app()->getLocale())}}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('offre')}}">{{GoogleTranslate::trans("Offre d'emploi", app()->getLocale())}}</a>
            </li>
        </ul>

        <div class="navigation_button">
            <button type="button" aria-label="toggle curtain navigation" class="nav_toggler">
                <span class="line l1"></span>
                <span class="line l2"></span>
                <span class="line l3"></span>
            </button>
        </div>
    </div>

    @auth
    <div class="section_profile btn-group">
        <div class="header_container_profile">
            <div class="header_profile" data-bs-toggle="dropdown" aria-expanded="false">
                <div class="profile">
                    <p class="header_name_profile">{{ Auth::user()->lastname[0]}}{{ Auth::user()->firstname[0]}}
                    <p>
                        <span><i class="fa-solid fa-angle-down"></i></span>
                </div>
            </div>
            <ul class="dropdown-menu dropdown_menu_profile dropdown-menu-end dropdown-menu-lg-start">
                <li>
                    <a class="dropdown-item" href="{{ route('recapitulatif')}}">
                        <span><i class="fa-solid fa-user"></i></span>
                        <p>{{GoogleTranslate::trans('Mon tableau de bord', app()->getLocale())}}</p>
                    </a>
                </li>
                <li>
                    <a class="dropdown-item" href="{{ route('parametre')}}">
                        <span><i class="fa-solid fa-gear"></i></span>
                        <p>{{GoogleTranslate::trans('Paramètre', app()->getLocale())}}</p>
                    </a>
                </li>
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <a class="dropdown-item item_none" href="#">
                            <span><i class="fa-solid fa-right-from-bracket"></i></span>
                            <button style="border: none; font-weight: bold;background: transparent;">{{GoogleTranslate::trans('Déconnexion', app()->getLocale())}}</button>
                        </a>
                    </form>
                </li>
            </ul>
        </div>
    </div>
    @else
    <div class="link_login">
      <a href="{{ route('login')}}">{{ GoogleTranslate::trans("Se connecter", app()->getLocale()) }}</a>
    </div>
    @endauth
</nav>

<div class="container_button_translate">
    <select name="" id="" class="changeLang">
        <option value="en" {{ session()->get('locale') == 'en' ? 'selected' : '' }}>AN</option>
        <option value="fr" {{ session()->get('locale') == 'fr' ? 'selected' : '' }}>FR</option>
        <option value="ar" {{ session()->get('locale') == 'ar' ? 'selected' : '' }}>ARA</option>
    </select>
</div>

