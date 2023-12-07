@extends('layouts.app')

@section('content')
<div class="container">
  <h1>{{ $house->title }}</h1>
  <div class="row">
    <div class="col-6">
      <img src="{{ $house->cover_image == 'https://placehold.co/600x400' ? 'https://placehold.co/600x400' : asset('/storage/'. $house->cover_image) }}" alt="" class="img-fluid">
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
      @foreach ($house->messages as $message)
      <p>{{$message->email}}: {{$message->text}}</p>
          
      @endforeach
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

  <div class="row">
    <div class="col-6">
        <p>
            <strong>Promozioni:</strong>
            {{-- @dd($house_sponsorship, $sponsorship) --}}
            @if ($house_sponsorship && $sponsorship)
            <div class="card-deck justify-content-around text-center">
              <h2 class="card-title">{{$sponsorship->name}}</h2>
              <h2 class="card-title">€ {{$sponsorship->price}}</h2>
              <p>La tua promozione scadrà il: {{$house_sponsorship->end_date}}</p>
            </div>
            @else
            <span>Non sponsorizzato</span>
            <div>              
              <a href="{{ route('admin.houses.sponsorship', $house) }}" class="btn btn-dark">Sponsorizza il tuo appartamento</a>
            </div>
            @endif
          
        </p>

    </div>
  </div>
</div>


@endsection 
