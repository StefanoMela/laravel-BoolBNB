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

<div class="card-deck justify-content-around text-center">
  @foreach ($sponsorships as $sponsor)
  <form action="#" method="post" enctype="multipart/form-data" class="card col-lg-4 mt-4 mb-5 border border-primary text-primary pt-3 pb-3">
  
      <h2 class="card-title">{{$sponsor->name}}</h2>
      <h2 class="card-title">€ {{$sponsor->price}}</h2>
      <hr>
      <h5 class="card-title">Sponsorizza il tuo appartamento per {{$sponsor->duration}} ore!</h5>
      <input type="hidden" name="house_id" value="{{$house->id}}">
      <input type="hidden" name="price" value="{{$sponsor->price}}">
      <input type="hidden" name="sponsorship_id" value="{{$sponsor->id}}">
      @csrf
      @method('GET')
      <input type="submit" class="btn btn-success" value="Acquista">
  
  </form>
  @endforeach
</div>
@endsection 
