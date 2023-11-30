@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <button class="btn"><a href="{{route('admin.houses.index')}}">Torna alla Lista</a></button>
        <h1 class="my-3">Progetti Eliminati</h1>

        <div class="row row-cols-2 row-cols-lg-4 g-2 g-lg-4">
            @foreach ($houses as $house)
                
            <div class="col">
                <div class="card h-100">
                    <img src="{{asset('/storage/' . $house->cover_image)}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h4 class="card-title">{{$house->title}}</h4>
                        <p class="card-text">{{$house->description}}</p>  
                        <p class="card-text">{{$house->delete_at}}</p>                        
                      
                        <div class="d-flex  gap-2">

                            <div class="d-flex">
                                <a href="#" data-bs-toggle="modal"
                                    data-bs-target="#restore-house-modal-{{ $house->id }}"><i
                                        class="fa-solid fa-arrow-turn-up fa-rotate-270 text-dark me-3"></i></a>
                                <a href="#" data-bs-toggle="modal"
                                    data-bs-target="#delete-house-modal-{{ $house->id }}"><i
                                        class="text-danger fa-solid fa-plane-departure"></i>
                                        
                                </a>
                            </div>
                        

                         </div> 
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

@section('modals')
    @foreach ($houses as $house)
        <div class="modal fade" id="delete-house-modal-{{ $house->id }}" tabindex="-1"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">{{ $house->title }}</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Vuoi davvero eliminare definitivamente il progetto '{{ $house->title }}'?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Chiudi</button>

                        <form method="POST" action="{{ route('admin.houses.trash.force-destroy', $house) }}">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-danger">Elimina</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        {{-- RESTORE --}}
        <div class="modal fade" id="restore-house-modal-{{ $house->id }}" tabindex="-1"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Conferma ripristino</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Vuoi davvero ripristinare il progetto '{{ $house->title }}'?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Chiudi</button>

                        <form method="POST" action="{{ route('admin.houses.trash.restore', $house) }}">
                            @method('PATCH')
                            @csrf
                            <button class="btn btn-success">Ripristina</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection