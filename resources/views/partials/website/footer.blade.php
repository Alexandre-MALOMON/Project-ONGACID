<footer>
    <div class="reseaux">
        <div class="adresse">
            <h2>ADRESSE</h2>
            <div class="bloc_footer">
                <div class="bloc_1">
                    <span><i class="fa-regular fa-location-dot"></i></span>
                    <p>BP : 711
                        Bâtiment Souka Consulting, Dembé,
                        avenue Goukouni Weddeye Face Eglise N° 12</p>
                </div>
                <div class="bloc_2">
                    <span><i class="fa-solid fa-phone"></i></span>
                    <p>(00235) 63595303 / 92880301 </p>
                </div>
                <div class="bloc_3">
                    <span><i class="fa-regular fa-envelope"></i></span>
                    <p>ongacidinfo2022@gmail.com</p>
                </div>
            </div>
        </div>
        <div class="icone_contact">
            <h2>RESEAUX SOCIAUX</h2>
            <div class="icone">
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
        </div>
        <form class="form_contact" method="post" action="{{ route('newslatter')}}">

            @csrf
            <h2>Abonnez-vous à notre newletter</h2>
            <div class="form_contact_input">
                <input name="email" type="email" placeholder="{{GoogleTranslate::trans('Email', app()->getLocale())}}"><br>
                @error('email')
                <span class="text-danger">{{ ($message) }}</span>
                @enderror
                <button>Envoyer</button>
            </div>
        </form>
    </div>
</footer>
