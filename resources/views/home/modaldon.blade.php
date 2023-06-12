<div class="overlay_don">
    <span class="close_button"><i class="fa-solid fa-xmark"></i></span>
    <form method="post" action="{{ route('don.store')}}" id="form">
        @csrf
        <div class="form-group col-md-12">
            <label for="sexe" class="text-gray-800">Catégorie de formtion</label>

            <select class="form-control" name="categoryDon_id" id="">
                @foreach (categoriDon() as $categoriDon)
                <option id="don" value="{{$categoriDon->id}}">{{$categoriDon->name}}</option>
                @endforeach

            </select>
        </div>
        <input type="text" id="lastname" name="lastname" placeholder="Nom"><br>
        <input type="text" id="firstname" name="firstname" placeholder="Prenom"><br>
        <input type="text" id="email" name="email" placeholder="Email"><br>
        <input type="text" id="contact" name="contact" placeholder="Numéro de téléphone"><br>
        <input type="number" id="montant"   name="montant" placeholder="Montant">
        <div id="error" style="color: red;"></div>
        <div class="overlay_button_don">
            <button class="close_button">Annuler</button>
            <button  >Envoyer</button>
        </div>
    </form>
</div>
