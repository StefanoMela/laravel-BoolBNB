@extends('layouts.app')

@section('content')
<section class="container">
  @include('admin.houses.partials.form', ["title" => "Edit House","essential" => "", "route" => 'admin.houses.update', 'idForm'=>'create-form', 'methodRoute' => 'PATCH', 'btnClass' => 'create-btn'])
</section>
@endsection