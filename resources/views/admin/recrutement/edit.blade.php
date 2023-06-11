<form action="{{route('recrutement.update',$recrutement->id)}}" method="POST">
    @csrf
    @method('put')
    <div class="modal fade" id="modalEdit{{$recrutement->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Mise à jour</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nom" class="text-gray-800">Intitulé du recrutement</label>
                        <input type="text" class="form-control" value="{{ $recrutement->name }}" name="name" id="inputEmail4">
                        @error('name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="nom" class="text-gray-800">Début du récrutement</label>
                        <input type="date" class="form-control" value="{{ $recrutement->start}}" name="start" id="inputEmail4">
                        @error('start')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="nom" class="text-gray-800">Fin du récrutement</label>
                        <input type="date" class="form-control" value="{{ $recrutement->end}}" name="end" id="inputEmail4">
                        @error('end')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="motivation" class="text-gray-800">Description(optionnel)</label>
                        <textarea class="form-control" id="summernote" name="description" cols="30" rows="10"> {!!$recrutement->description!!}</textarea>
                        @error('description')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <input type="hidden" name="type" value="1">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-primary">Confirmer</button>
                </div>
            </div>
        </div>
    </div>

</form>
