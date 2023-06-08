<form action="{{route('message.destroy', $contact->id)}}" method="POST">
    @csrf
    @method('DELETE')

    <div class="modal fade" id="modalDelete{{ $contact->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ GoogleTranslate::trans("Confirmation de la suppression", app()->getLocale()) }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    {{ GoogleTranslate::trans("Comfirmez la suppression du message de", app()->getLocale()) }} <strong>{{ GoogleTranslate::trans($contact->name, app()->getLocale()) }} </strong>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ GoogleTranslate::trans("Annuler", app()->getLocale()) }}</button>
                    <button type="submit" class="btn btn-primary">{{ GoogleTranslate::trans("Confirmer", app()->getLocale()) }}</button>
                </div>
            </div>
        </div>
    </div>

</form>
