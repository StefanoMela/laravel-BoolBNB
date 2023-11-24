@extends('layouts.app')

@section('content')
<section class="container">
  @include('admin.houses.partials.form', ["title" => "Add New House","essential" => "*", "route" => 'admin.houses.store', 'idForm'=>'create-form', 'methodRoute' => 'POST', 'btnClass' => 'create-btn'])
</section>
@endsection