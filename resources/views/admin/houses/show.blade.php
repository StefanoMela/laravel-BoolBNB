@extends('layouts.app')

@section('content')
<div class="container">
  <h1>{{ $house->title }}</h1>
  <div class="row">
    <div class="col-6">
      <img src="{{asset('/storage/'.$house->cover_image)}}" alt="" class="img-fluid">
    </div>
    <div class="col-6"></div>
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