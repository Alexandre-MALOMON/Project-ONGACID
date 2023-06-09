<div class="overlay_don">
    <span class="close_button"><i class="fa-solid fa-xmark"></i></span>
    <form method="post" action="{{ route('don.store')}}" id="form">
        @csrf
        <div class="form-group col-md-12">
            <label for="sexe" class="text-gray-800">{{GoogleTranslate::trans('Catégorie de formtion', app()->getLocale())}}</label>

            <select class="form-control" name="categoryDon_id" id="">
                @foreach (categoriDon() as $categoriDon)
                <option id="don" value="{{$categoriDon->id}}">{{GoogleTranslate::trans($categoriDon->name, app()->getLocale())}}</option>
                @endforeach

            </select>
        </div>
        <input type="text" id="lastname" name="lastname" placeholder="{{GoogleTranslate::trans('Nom', app()->getLocale())}}"><br>
        <input type="text" id="firstname" name="firstname" placeholder="{{GoogleTranslate::trans('Prenom', app()->getLocale())}}"><br>
        <input type="text" id="email" name="email" placeholder="{{GoogleTranslate::trans('Email', app()->getLocale())}}"><br>
        <input type="text" id="contact" name="contact" placeholder="{{GoogleTranslate::trans('Numéro de téléphone', app()->getLocale())}}"><br>
        <input type="number" id="montant"   name="montant" placeholder="{{GoogleTranslate::trans('Montant', app()->getLocale())}}">
        <div id="error" style="color: red;"></div>
        <div class="overlay_button_don">
            <button class="close_button">{{GoogleTranslate::trans('Annuler', app()->getLocale())}}</button>
            <button  >{{GoogleTranslate::trans('Envoyer', app()->getLocale())}}</button>
        </div>
    </form>
</div>
