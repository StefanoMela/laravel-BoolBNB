@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <button class="btn"><a href="{{route('admin.houses.create')}}">Add House</a></button>
        <div class="row row-cols-2 row-cols-lg-4 g-2 g-lg-4">
            @foreach ($houses as $house)
                
            <div class="col">
                <div class="card h-100">
                    <img src="{{$house->cover_image}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h4 class="card-title">{{$house->title}}</h4>
                        <p class="card-text">{{$house->description}}</p>                        
                        {{-- <p class="card-text">{{$house->user_id}}</p>                         --}}
                    </div>
                </div>
            </div>
            @endforeach
            
        </div>
        <div class="mt-5">
            {{ $houses->links('pagination::bootstrap-5') }}
        </div>
    </div>
@endsection