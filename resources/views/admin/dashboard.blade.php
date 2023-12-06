@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="fs-4 text-secondary my-4">
        {{ __('Dashboard') }}
    </h2>
    @dump($houses_sponsorship, $houses)
    <div>
        @foreach ($houses_sponsorship as $item)
            <div>{{$item->id}}</div>
        @endforeach
    </div>
    <div class="row justify-content-center g-2">
        
        <div class="col-8">
            <div class="card">
                <div class="card-header">My Houses</div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Message</th>
                            <th scope="col">Sponsorship</th>
                            <th scope="col"></th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($houses as $house)
                            {{-- @dump($house) --}}
                                <tr>
                                    <th scope="row">{{ $loop->index+1}}</th>
                                    <td>{{$house->title}}</td>
                                    <td>{!!$house->getMessagge()!!}</td>
                                    <td>{!!$house->getSponsorship($houses_sponsorship)!!}</td>
                                    <td>
                                        <div class="d-flex justify-content-between align-items-center mt-3 flex-wrap ">
                                        <a class="btn btn-outline-primary" href="{{ route('admin.houses.edit', $house) }}">Modifica</a>
                                        <a class="btn btn-outline-primary" href="{{ route('admin.houses.show', $house) }}">Info</a>
                                        @include('admin.houses.partials.delete_button')
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="mt-5 d-flex justify-content-center">
                        {{ $houses->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="row g-4">
                
                
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">Messages</div>
                        
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                  <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Text</th>
                                    <th scope="col">House</th>
                                    {{-- <th scope="col">Sponsorship</th>
                                    <th scope="col"></th> --}}
                                  </tr>
                                </thead>
                                <tbody>
                                    @foreach ($houses as $house)
                                    {{-- @dump($house) --}}
                                        <tr>
                                            <th scope="row">{{ $loop->index+1}}</th>
                                            {{-- <td>{{$house->messages->text}}</td> --}}
                                            <td>{{$house->id}}</td>
                                            {{-- <td>{!!$house->getSponsorship($houses_sponsorship)!!}</td>
                                            <td>
                                                <div class="d-flex justify-content-between align-items-center mt-3 flex-wrap ">
                                                <a class="btn btn-outline-primary" href="{{ route('admin.houses.edit', $house) }}">Modifica</a>
                                                <a class="btn btn-outline-primary" href="{{ route('admin.houses.show', $house) }}">Info</a>
                                                @include('admin.houses.partials.delete_button')
                                                </div>
                                            </td> --}}
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">Sponsorship</div>
                        
                        <div class="card-body">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
                        Vuoi davvero mettere nel cestino la casa '{{ $house->title }}'?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Chiudi</button>

                        <form method="POST" action="{{ route('admin.houses.destroy', $house) }}">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-danger">Elimina</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
