@extends('partials.website.app')
@section('website_content')
<div class="swiper">
    <div class="swiper-wrapper">
        <div class="swiper-slide img-1">
            <div class="text_slide_1">
                <h2>{{GoogleTranslate::trans('GESTION DE PROJET', app()->getLocale())}}</h2>
                <p>{{GoogleTranslate::trans('Mise en place de canevas et cadre logique de projet.', app()->getLocale())}}
                </p>
            </div>
        </div>
        <div class="swiper-slide img-2">
            <div class="text_slide_2">
                <h2>{{GoogleTranslate::trans('HUMANITAIRE', app()->getLocale())}}</h2>
                <p>{{GoogleTranslate::trans('Gestion des catastrophes et secours humanitaires en situation de guerre.', app()->getLocale())}}
                </p>
            </div>
        </div>
        <div class="swiper-slide img-3">
            <div class="text_slide_3">
                <h2>{{GoogleTranslate::trans("ACTION CITOYENNE", app()->getLocale())}}</h2>
                <p>{{GoogleTranslate::trans('Sensibilisation pour le changement de comportement lié à la violence, ségrégation.', app()->getLocale())}}
                </p>
            </div>
        </div>
        <div class="swiper-slide img-4">
            <div class="text_slide_3">
                <h2>{{GoogleTranslate::trans('ENVIRONNEMENT', app()->getLocale())}}</h2>
                <p>{{GoogleTranslate::trans('Lutte contre la pollution.', app()->getLocale())}}
                </p>
            </div>
        </div>
        <div class="swiper-slide img-5">
            <div class="text_slide_3">
                <h2>{{GoogleTranslate::trans('AGRICULTURE ET ENERGIE RENOUVELABLE', app()->getLocale())}}</h2>
                <p>{{GoogleTranslate::trans("Lutte contre l'insécurité alimentaire.", app()->getLocale())}}
                </p>
            </div>
        </div>
    </div>

    <div class="swiper-pagination"></div>
    <!--  <div class="swiper-button-prev btn_swiper"></div>
            <div class="swiper-button-next btn_swiper"></div> -->
</div>

<section class="container_about">
    <div class="about_item">
        <div class="img_about">
            <img src="{{ asset('images/about-3.jpg') }}" alt="">
        </div>
        <div class="text_about">
            <h3>{{GoogleTranslate::trans('// A propos', app()->getLocale())}}</h3>
            <h1>{{GoogleTranslate::trans("L'ONG ACID", app()->getLocale())}}</h1>
            <p>
                {{ GoogleTranslate::trans("L'Association pour la Coopération Internationale au Développement (ACID) est une ONG Nationale Autorisée à fonctionner Folio N° 016/R-CB/DB/SG/SEAD/2003 du 30/07/2003 et enregistré au Journal Officiel de la République au mois d’août 2003 sous le n° 008. Elle est régie par l’article 4 de l’ordonnance N°27/SUR/62 du 28 juillet 62 et de l’article 7 de décret N°165/INT/SUR/62 de 25 Aout 1962. Passe avec le statut de ONG en 2019.", app()->getLocale()) }}
            </p>
        </div>
    </div>
</section>

<section class="container_cards">
    <div class="card_group_obj">
        <div class="carde">
            <div class="carde_item">
                <span><i class="fa-solid fa-ranking-star"></i></pan>
                    <h2>{{GoogleTranslate::trans("MISSION", app()->getLocale())}}</h2>
                    <p>
                        - {{ GoogleTranslate::trans("Lutte contre la pauvreté", app()->getLocale()) }}<br>
                        - {{ GoogleTranslate::trans("Amélioration des conditions de vie", app()->getLocale()) }}<br>
                        - {{ GoogleTranslate::trans("Promotion du développement durable.", app()->getLocale()) }}<br>
                        - {{ GoogleTranslate::trans("Sensibiliser au changement de comportement face au changement climatique", app()->getLocale()) }}<br>
                        - {{ GoogleTranslate::trans("Plaidoyer et communication", app()->getLocale()) }}<br>
                        - {{ GoogleTranslate::trans("Plaidoyer en action humanitaire", app()->getLocale()) }}<br>
                        - {{ GoogleTranslate::trans("Accompagnement des réfugiés sur des projets AGR", app()->getLocale()) }}<br>
                        - {{ GoogleTranslate::trans("Accompagnement sur la situation de l'enfance et de la famille", app()->getLocale()) }}<br>
                    </p>
            </div>

        </div>
        <div class="carde">
            <div class="carde_item">
                <span><i class="fa-regular fa-eye"></i></pan>
                    <h2>{{GoogleTranslate::trans("VISION", app()->getLocale())}}</h2>
                    <p>
                        - {{ GoogleTranslate::trans("Former les jeunes dans l’entreprenariat", app()->getLocale()) }}<br>
                        - {{ GoogleTranslate::trans("Atteindre l’autosuffisance alimentaire", app()->getLocale()) }}<br>
                        - {{ GoogleTranslate::trans("Restaurer l’écosystème et la biodiversité", app()->getLocale()) }}<br>
                        - {{ GoogleTranslate::trans("Promouvoir l’atténuation et l’adaptions face au changement climatique.", app()->getLocale()) }}<br>
                    </p>
            </div>
        </div>
        <div class="carde">
            <div class="carde_item">
                <span><i class="fa-solid fa-briefcase"></i></pan>
                    <h2>{{GoogleTranslate::trans("NOTRE SAVOIR-FAIRE", app()->getLocale())}}</h2>
                    <p>
                        - {{ GoogleTranslate::trans("Intervenir à différentes échelles : locale, régionale, nationale, internationale;", app()->getLocale()) }}<br>
                        - {{ GoogleTranslate::trans("Développer et intégrer des dispositifs variés avec des solution pratique;", app()->getLocale()) }}<br>
                        - {{ GoogleTranslate::trans("Porter des visions à court, moyen et long terme;", app()->getLocale()) }}<br>
                        - {{ GoogleTranslate::trans("Réunir des intérêts composites autour de problématiques complexes;", app()->getLocale()) }}<br>
                        - {{ GoogleTranslate::trans("Chercher à financer des connaissances nouvelles.", app()->getLocale()) }}<br>
                    </p>
            </div>
        </div>
        <div class="carde">
            <div class="carde_item">
                <span><i class="fa-solid fa-handshake-simple"></i></pan>
                    <h2>{{GoogleTranslate::trans("NOS VALEURS", app()->getLocale())}}</h2>
                    <p>
                        - {{ GoogleTranslate::trans("Anticipation;", app()->getLocale()) }}<br>
                        - {{ GoogleTranslate::trans("Neutralité;", app()->getLocale()) }}<br>
                        - {{ GoogleTranslate::trans("Sens du travail collectif;", app()->getLocale()) }}<br>
                    </p>
            </div>
        </div>
        <div class="carde">
            <div class="carde_item">
                <span><i class="fa-solid fa-hands-holding-circle"></i></pan>
                    <h2>{{GoogleTranslate::trans("NOS PRINCIPES D'ACTIONS", app()->getLocale())}}</h2>
                    <p>
                        - {{ GoogleTranslate::trans("Inspirer", app()->getLocale()) }}<br>
                        - {{ GoogleTranslate::trans("Accompagner", app()->getLocale()) }}<br>
                        - {{ GoogleTranslate::trans("Animer", app()->getLocale()) }}<br>
                        - {{ GoogleTranslate::trans("Suivre et évaluer", app()->getLocale()) }}<br>
                    </p>
            </div>
        </div>
        <div class="carde">
            <div class="carde_item">
                <span><i class="fa-solid fa-arrow-trend-up"></i></pan>
                    <h2>{{GoogleTranslate::trans("STRATÉGIE ET PRIORITÉ", app()->getLocale())}}</h2>
                    <p>
                        {{ GoogleTranslate::trans("Notre stratégie est d’être réactif 
                            aux problèmes de la société civile en se basant sur des 
                            solutions pratique urgente de l’heure. Des réponses aux 
                            situations précaires lié aux changements climatiques avec 
                            de posture d’anticipation et d’action. ", app()->getLocale()) }}<br>
                    </p>
            </div>
        </div>
    </div>
</section>

<section class="container_card_profile">
    <h2>{{GoogleTranslate::trans("Notre equipe", app()->getLocale())}}</h2>
    <div class="card_profile_group">
        <div class="card_profile">
            <div class="card_profile">
                <img src="{{ asset('images/profile-2.jpg') }}" alt="">
                <h3>NGASSADI EPAINETE</h3>
                <p>{{GoogleTranslate::trans("Coordonnateur", app()->getLocale())}}</p>
            </div>
        </div>
        <div class="card_profile">
            <img src="{{ asset('images/profile-1.jpg') }}" alt="">
            <h3>HASSAN DJIDDI SETCHIMI</h3>
            <p>{{GoogleTranslate::trans("Chargé de programme et projet", app()->getLocale())}}</p>
        </div>
        <div class="card_profile">
            <img src="{{ asset('images/profile-3.jpg') }}" alt="">
            <h3>SHALOM BOUKAR</h3>
            <p>{{GoogleTranslate::trans("Trésorier général", app()->getLocale())}}</p>
        </div>
        <div class="card_profile">
            <img src="{{ asset('images/profile-4.jpg') }}" alt="">
            <h3>MAPADA DIEUDONNE</h3>
            <p>{{ GoogleTranslate::trans("Conseiller juridique", app()->getLocale()) }}</p>
        </div>
    </div>
</section>

<section class="container_contact">
    <div class="contact">
        @if (Session::has('success'))
        <div class="alert alert-success">
            {{ GoogleTranslate::trans( Session::get('success') , app()->getLocale()) }}
        </div>
        @endif

        <h2>{{"Contactez-nous"}}</h2>
        <form method="post" action="{{ route('contact')}}">
            @csrf
            <div class="input_group">
                <div class="input">
                    <input name="name" type="text" placeholder="{{GoogleTranslate::trans('Nom & prénom', app()->getLocale())}}">
                    @error('name')
                    <span class="text-danger">{{ GoogleTranslate::trans($message, app()->getLocale()) }}</span>
                    @enderror
                </div>
                <div class="input">
                    <input name="email" type="email" placeholder="{{GoogleTranslate::trans('Email', app()->getLocale())}}">
                    @error('email')
                    <span class="text-danger">{{ GoogleTranslate::trans($message, app()->getLocale()) }}</span>
                    @enderror
                </div>

            </div>
            <textarea name="message" cols="30" rows="10" maxlength="50" placeholder="{{GoogleTranslate::trans('Votre message', app()->getLocale())}}"></textarea>
            @error('message')
            <span class="text-danger">{{ GoogleTranslate::trans($message, app()->getLocale()) }}</span>
            @enderror <button>{{GoogleTranslate::trans('Envoyer', app()->getLocale())}}</button>
        </form>
    </div>
</section>

<div class="container_alerter">
    <span class="close_alert"><i class="fa-solid fa-xmark"></i></span>
    <div class="alerter">
        <span><i class="fa-solid fa-person-circle-exclamation"></i></span>
        <a href="{{ route('alert')}}">{{GoogleTranslate::trans("Alerter un fait", app()->getLocale())}}</a>
    </div>
</div>
@endsection