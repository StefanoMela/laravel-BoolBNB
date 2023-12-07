@extends('layouts.app')

@section('content')
<div class="container">
  <h1>{{ $house->title }}</h1>
  <div class="row">
    <div class="col-6">
      <img src="{{asset('/storage/'.$house->cover_image)}}" alt="" class="img-fluid">
    </div>
    <div class="col-6">
      <h5>Galleria</h5>
      <div class="img-container">
        @if($gallery_images)
        @foreach($gallery_images as $gallery_image)
        <div class="col-2">
          <img src="{{ asset('/storage/' . $gallery_image->image) }}" alt="">
        </div>
        @endforeach
        @endif
      </div>
    </div>
    <div class="col-6 my-4">
      <p>
        {{ $house->description }}
      </p>
      <p>Intestatario: {{ $user->name }} {{$user->last_name}}</p>
      <p>
        {{ $house->address }}
      </p>
    </div>
    <div class="col-6 my-4 border p-4 rounded-pill">
      Qui andranno i messaggi
    </div>
  </div>
  <div class="row">
    <h3>Caratteristiche</h3>
    <div class="col-6">
      <p><b>Stanze:</b> {{$house->rooms}}</p>
      <p><b>Metri quadri:</b> {{$house->sq_meters}}</p>
      <p><b>Numeri di letti:</b> {{$house->beds}}</p>
      <p><b>Numero di bagni:</b> {{$house->bathrooms}}</p>
    </div>
  </div>
      <div class="gallery_btn_container container col-6">
          <a href="{{route('admin.gallery.index', $house->id)}}" class="btn">Aggiungi altre foto</a>
      </div>
  <div class="row">
    <h3>Servizi aggiuntivi</h3>
    <div class="col-6 d-flex justify-content-between mb-5 mt-3">
      @foreach($house->extras as $extra)
      <div class="d-flex flex-column align-items-center">
        <div>{!! $extra->icon !!}</div>
        <div class=""><span class='badge' style='background-color: {{$extra->color}}'>{{$extra->name}}</span></div>
      </div>
      @endforeach
    </div>
  </div>


</div>
@endsection