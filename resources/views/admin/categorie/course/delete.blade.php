<form  action="{{route('courscategory.destroy', $courCategory->id)}}" method="POST">
@csrf
@method('DELETE')

<div class="modal fade" id="modalDelete{{ $courCategory->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirmation de la suppression</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      Comfirmez la suppression de la catégorie <strong>{{ $courCategory->name }} </strong>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
        <button type="submit" class="btn btn-primary">Confirmer</button>
      </div>
    </div>
  </div>
</div>

</form>
