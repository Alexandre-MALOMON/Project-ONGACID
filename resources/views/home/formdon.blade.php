@include('partials.website.head')

<section class="form_don">
    <h2>FAIRE UN DON</h2>
    <form>
        <div class="input_don">
            <input name="name" type="text" placeholder="Nom & prénom">
        </div>
        <div class="input_don">
            <input name="email" type="email" placeholder="Email">
        </div>
        <div class="input_don">
            <textarea name="message" cols="30" rows="10" maxlength="50" placeholder="Votre message"></textarea>
        </div>
        <button>Envoyer</button>
    </form>
</section>
