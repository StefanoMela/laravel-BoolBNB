
{{-- <form method="POST" action="{{ route('admin.houses.destroy', $house) }}">
    @method('DELETE')
    @csrf
   
</form> --}}
<div  class="text-center " >
    <button    data-bs-toggle="modal" class="btn btn-danger text-center "
       data-bs-target="#delete-house-modal-{{ $house->id }}" ><i
       class="text-center fa-solid fa-trash me-2 "></i></button>
</div>