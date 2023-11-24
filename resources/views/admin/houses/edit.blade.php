@extends('layouts.app')

@section('content')
<section class="container">
  @include('admin.houses.partials.form', ["title" => "Edit House","essential" => "", "route" => 'admin.houses.update', 'idForm'=>'create-form', 'methodRoute' => 'PATCH', 'btnClass' => 'create-btn'])
</section>
@endsection

@section('scripts')
<script>
    const previewImg = document.getElementById('cover_image_preview');
    const inputFile = document.getElementById('cover_image');

    if (!previewImg.getAttribute('src') || previewImg.getAttribute('src') == "http://localhost:8000/storage" ){
        previewImg.src = "https://picsum.photos/200"
    }

    inputFile.addEventListener('change', function() {
        const [file] = this.files
        previewImg.src= URL.createObjectURL(file);
    })

</script>
@endsection