<form  action="{{route('user.update', $user->id)}}" method="POST">
@csrf
@method('put')

<div class="modal fade" id="modalEdit{{ $user->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       @if ($user->status == 1)
       <input type="hidden" name="status" value="0" id="">
       @else
       <input type="hidden" name="status" value="1" id="">
       @endif
       <p>{{ GoogleTranslate::trans("Voulez-vous" . $user->status ==1 ? " Bloquer" :  " Débloquer", app()->getLocale()) }}<b>{{$user->lastname}} {{$user->firstname}}</b></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ GoogleTranslate::trans("Annuler", app()->getLocale()) }}</button>
        <button type="submit" class="btn btn-primary">{{ GoogleTranslate::trans("Confirmer", app()->getLocale()) }}</button>
      </div>
    </div>
  </div>
</div>

</form>
@yield('delete')
