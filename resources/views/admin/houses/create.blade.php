@extends('layouts.app')

@section('content')
<section class="container">
  @include('admin.houses.partials.form', ["title" => "Add New House","essential" => "*", "route" => 'admin.houses.store', 'idForm'=>'create-form', 'methodRoute' => 'POST', 'btnClass' => 'create-btn'])
  @include('admin.houses.partials.gallery_form')
</section>
@endsection


@section('scripts')
<script>
    const previewImg = document.getElementById('cover_image_preview');
    const inputFile = document.getElementById('cover_image');

   
    inputFile.addEventListener('change', function() {
        const [file] = this.files
        previewImg.src= URL.createObjectURL(file);
    })

</script>
@endsection