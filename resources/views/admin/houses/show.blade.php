@extends('layouts.app')

@section('content')
<div class="container">
  <h1 class="my-3">{{ $house->title }}</h1>
  <div class="row">
    <div class="col-6">
      <img
        src="{{ $house->cover_image == 'https://placehold.co/600x400' ? 'https://placehold.co/600x400' : asset('/storage/'. $house->cover_image) }}"
        alt="" class="img-fluid">
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
      <div>
        <p>
        <strong>Descrizione: <br></strong>
          @php
          $descriptionTagliata = str_split($house->description, 70);
          echo implode('<br>', $descriptionTagliata);
        @endphp        </p>
      </div>
      
      <p><strong>Intestatario:</strong>  {{ $user->name }} {{$user->last_name}}</p>
      <p>
        <strong>Indirizzo: </strong>{{ $house->address }}
      </p>
    </div>
    {{-- @dd($house->messages->toArray()) --}}
    @if ($house->messages->toArray())
    <div class="col-6 my-4 border p-4 ">
      <h4 class="mb-5">lista messaggi ricevuti: </h4>
      @foreach ($house->messages as $message)
      <p><strong>E-mail Mittente:</strong>  {{$message->email}} <br><strong>Testo messaggio:</strong>  {{$message->text}} </p>
      <hr>

      @endforeach
    </div>
    @else
    <div class="col-6 my-4 border p-4 rounded">
      <p>Nessun messagio ricevuto</p>
    </div>
    @endif
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
    <div class="col-6 d-flex gap-3 mb-5 mt-3">
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
        <a href="{{ route('admin.houses.sponsorship', $house) }}" class="btn btn-dark">Sponsorizza il tuo
          appartamento</a>
      </div>
      @endif

      </p>

    </div>
  </div>
</div>
@endsection