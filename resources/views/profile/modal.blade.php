<form action="{{route('deleteAcount', Auth::user()->id)}}" method="POST">
    @csrf
    @method('DELETE')

    <div class="modal fade" id="modalDelete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Confirmation de la suppression</h5>
                   <!--  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                </div>
                <div class="modal-body">
                   <p>Voulez-vous supprimer votre Compte ?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-danger">Confirmer</button>
                </div>
            </div>
        </div>
    </div>

</form>
<style>
    .modal-content{
background-color: white;
    }
</style>
@yield('delete')
