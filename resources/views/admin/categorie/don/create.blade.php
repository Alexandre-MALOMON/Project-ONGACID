<form action="{{route('categorydon.store')}}" method="POST">
    @csrf

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Nouvelle catégorie </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nom" class="text-gray-800">Intitulé de la catégorie </label>
                        <input type="text" class="form-control" name="name" id="inputEmail4" >
                        @error('name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="motivation" class="text-gray-800"> Description(optionnel) </label>
                        <textarea class="form-control" id="editor" name="description" cols="30" rows="10"></textarea>
                        @error('description')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"> Annuler </button>
                    <button type="submit" class="btn btn-primary">Confirmer </button>
                </div>
            </div>
        </div>
    </div>

</form>
@yield('delete')
