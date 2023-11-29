
{{-- <form method="POST" action="{{ route('admin.houses.destroy', $house) }}">
    @method('DELETE')
    @csrf
   
</form> --}}
<div   >
    <a   href="#" data-bs-toggle="modal" class="btn btn-danger "
       data-bs-target="#delete-house-modal-{{ $house->id }}" ><i
       class=" fa-solid fa-trash me-2 "></i>Elimina</a>
</div>