@extends('partials.website.app')
@section('website_content')
<div class="swiper">
    <div class="swiper-wrapper">
        <div class="swiper-slide img-1">
            <div class="text_slide_1">
                <h2>GESTION DE PROJET</h2>
                <p>Mise en place de canevas et cadre logique de projet.</p>
            </div>
        </div>
        <div class="swiper-slide img-2">
            <div class="text_slide_2">
                <h2>HUMANITAIRE</h2>
                <p>Gestion des catastrophes et secours humanitaires en situation de guerre.</p>
            </div>
        </div>
        <div class="swiper-slide img-3">
            <div class="text_slide_3">
                <h2>ACTION CITOYENNE</h2>
                <p>Sensibilisation pour le changement de comportement lié à la violence, ségrégation.</p>
            </div>
        </div>
        <div class="swiper-slide img-4">
            <div class="text_slide_3">
                <h2>ENVIRONNEMENT</h2>
                <p>Lutte contre la pollution.
                </p>
            </div>
        </div>
        <div class="swiper-slide img-5">
            <div class="text_slide_3">
                <h2>AGRICULTURE ET ENERGIE RENOUVELABLE</h2>
                <p>Lutte contre l'insécurité alimentaire.
                </p>
            </div>
        </div>
    </div>

    <div class="swiper-pagination"></div>
</div>

<section class="container_about">
    <div class="about_item">
        <div class="img_about">
            <img src="{{ asset('images/about-3.jpg') }}" alt="">
        </div>
        <div class="text_about">
            <h3>// A propos</h3>
            <h1>L'ONG ACID</h1>
            <p>
                L'Association pour la Coopération Internationale au Développement (ACID) est une ONG Nationale Autorisée à fonctionner Folio N° 016/R-CB/DB/SG/SEAD/2003 du 30/07/2003 et enregistré au Journal Officiel de la République au mois d’août 2003 sous le n° 008. Elle est régie par l’article 4 de l’ordonnance N°27/SUR/62 du 28 juillet 62 et de l’article 7 de décret N°165/INT/SUR/62 de 25 Aout 1962. Passe avec le statut de ONG en 2019.
            </p>
        </div>
    </div>
</section>

<section class="container_cards">
    <div class="card_group_obj">
        <div class="carde">
            <div class="carde_item">
                <span><i class="fa-solid fa-ranking-star"></i></pan>
                    <h2>MISSION</h2>
                    <p>
                       Lutte contre la pauvreté<br>
                       Amélioration des conditions de vie<br>
                       Promotion du développement durable<br>
                       Sensibiliser au changement de comportement face au changement climatique<br>
                       Plaidoyer et communication<br>
                       Plaidoyer en action humanitaire<br>
                       Accompagnement des réfugiés sur des projets AGR<br>
                       Accompagnement sur la situation de l'enfance et de la famille<br>
                    </p>
            </div>

        </div>
        <div class="carde">
            <div class="carde_item">
                <span><i class="fa-regular fa-eye"></i></pan>
                    <h2>VISION</h2>
                    <p>
                      Former les jeunes dans l’entreprenariat<br>
                      Atteindre l’autosuffisance alimentaire<br>
                      Restaurer l’écosystème et la biodiversité<br>
                      Promouvoir l’atténuation et l’adaptions face au changement climatique<br>
                    </p>
            </div>
        </div>
        <div class="carde">
            <div class="carde_item">
                <span><i class="fa-solid fa-briefcase"></i></pan>
                    <h2>NOTRE SAVOIR-FAIRE</h2>
                    <p>
                        Intervenir à différentes échelles : locale, régionale, nationale, internationale<br>
                        Développer et intégrer des dispositifs variés avec des solution pratique<br>
                        Porter des visions à court, moyen et long terme<br>
                        Réunir des intérêts composites autour de problématiques complexes<br>
                        Chercher à financer des connaissances nouvelles<br>
                    </p>
            </div>
        </div>
        <div class="carde">
            <div class="carde_item">
                <span><i class="fa-solid fa-handshake-simple"></i></pan>
                    <h2>NOS VALEURS</h2>
                    <p>
                        Anticipation<br>
                        Neutralité<br>
                        Sens du travail collectif<br>
                    </p>
            </div>
        </div>
        <div class="carde">
            <div class="carde_item">
                <span><i class="fa-solid fa-hands-holding-circle"></i></pan>
                    <h2>NOS PRINCIPES D'ACTIONS</h2>
                    <p>
                        Inspirer<br>
                        Accompagner<br>
                        Animer<br>
                        Suivre et évaluer<br>
                    </p>
            </div>
        </div>
        <div class="carde">
            <div class="carde_item">
                <span><i class="fa-solid fa-arrow-trend-up"></i></pan>
                    <h2>STRATÉGIE ET PRIORITÉ</h2>
                    <p>
                        Notre stratégie est d’être réactif 
                            aux problèmes de la société civile en se basant sur des 
                            solutions pratique urgente de l’heure. Des réponses aux 
                            situations précaires lié aux changements climatiques avec 
                            de posture d’anticipation et d’action.<br>
                    </p>
            </div>
        </div>
    </div>
</section>

<section class="container_card_profile">
    <h2>Notre equipe</h2>
    <div class="card_profile_group">
        <div class="card_profile">
            <div class="card_profile">
                <img src="{{ asset('images/profile-2.jpg') }}" alt="">
                <h3>NGASSADI EPAINETE</h3>
                <p>Coordonnateur</p>
            </div>
        </div>
        <div class="card_profile">
            <img src="{{ asset('images/profile-1.jpg') }}" alt="">
            <h3>HASSAN DJIDDI SETCHIMI</h3>
            <p>Chargé de programme et projet</p>
        </div>
        <div class="card_profile">
            <img src="{{ asset('images/profile-3.jpg') }}" alt="">
            <h3>SHALOM BOUKAR</h3>
            <p>Trésorier général</p>
        </div>
        <div class="card_profile">
            <img src="{{ asset('images/profile-4.jpg') }}" alt="">
            <h3>MAPADA DIEUDONNE</h3>
            <p>Conseiller juridique</p>
        </div>
    </div>
</section>

<section class="container_contact">
    <div class="contact">
        @if (Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
        @endif

        <h2>Contactez-nous</h2>
        <form method="post" action="{{ route('contact')}}">
            @csrf
            <div class="input_group">
                <div class="input">
                    <input name="name" type="text" placeholder="{{GoogleTranslate::trans('Nom & prénom', app()->getLocale())}}">
                    @error('name')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="input">
                    <input name="email" type="email" placeholder="{{GoogleTranslate::trans('Email', app()->getLocale())}}">
                    @error('email')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

            </div>
            <textarea name="message" cols="30" rows="10" maxlength="50" placeholder="{{GoogleTranslate::trans('Votre message', app()->getLocale())}}"></textarea>
            @error('message')
            <span class="text-danger">{{ ($message) }}</span>
            @enderror <button>Envoyer</button>
        </form>
    </div>
</section>

<div class="container_alerter">
    <span class="close_alert"><i class="fa-solid fa-xmark"></i></span>
    <div class="alerter">
        <span><i class="fa-solid fa-person-circle-exclamation"></i></span>
        <a href="{{ route('alert')}}">Alerter un fait</a>
    </div>
</div>
@endsection