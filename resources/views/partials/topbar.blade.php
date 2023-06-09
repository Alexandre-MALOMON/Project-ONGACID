<!-- Topbar -->
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>
    <select class="form-select col-md-3 changeLang">
        <option value="en" {{ session()->get('locale') == 'en' ? 'selected' : '' }}>{{ GoogleTranslate::trans('Anglais', app()->getLocale()) }}</option>
        <option value="fr" {{ session()->get('locale') == 'fr' ? 'selected' : '' }}>{{ GoogleTranslate::trans('Français', app()->getLocale()) }}</option>
        <option value="ar" {{ session()->get('locale') == 'ar' ? 'selected' : '' }}>{{ GoogleTranslate::trans('Arabe', app()->getLocale()) }}</option>
    </select>
    <ul class="navbar-nav ml-auto">

        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{Auth::user()->firstname }} {{Auth::user()->lastname }}</span>
                <img class="img-profile rounded-circle" src="{{ asset('images/user.svg')}}">
            </a>
            <!-- Dropdown - User Information -->

            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    {{ GoogleTranslate::trans('Déconnexion', app()->getLocale()) }}
                </a>
            </div>
        </li>
    </ul>

    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ GoogleTranslate::trans('Déconnexion', app()->getLocale()) }}</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body"> {{ GoogleTranslate::trans('Voulez-vous déconnecter ?', app()->getLocale()) }}</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">{{ GoogleTranslate::trans('Annuler', app()->getLocale()) }}</button>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                            <button class="btn btn-danger"> {{ GoogleTranslate::trans('Déconnexion', app()->getLocale()) }}</button>
                        </x-responsive-nav-link>
                    </form>

                </div>
            </div>
        </div>
    </div>
</nav>
<!-- End of Topbar -->