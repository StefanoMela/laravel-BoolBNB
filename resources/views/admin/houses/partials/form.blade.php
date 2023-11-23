@if ($errors->any())
    <div id="popup_message" class="d-none" data-type="warning" data-message="Check errors"></div>
@endif

<form action="{{ route($route) }}" id="{{$idForm}}" method="POST" class="my-2" enctype="multipart/form-data">
    @csrf
    {{-- @method($methodRoute) --}}
    <div class="card">
      <div class="card-header">
        <h2 class="text-center mb-2">{{$title}}</h2>
      </div>
      <div class="card-body">
        {{-- <div class="form-outline w-25 mb-3">
            <label for="ISBN" class="form-label">ISBN</label>
            <input type="text" class="form-control @error('ISBN') is-invalid @enderror" maxlength="13" id="ISBN" name="ISBN" value="{{ old('ISBN', $house->ISBN) }}">
            @error('ISBN')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror    
        </div> --}}
        <div class="mb-3 w-50">
            <label for="title" class="form-label">Titolo</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror"  maxlength="200" id="title" name="title" value="{{ old('title',$house->title) }}">           
            @error('title')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror    

        </div>

        <div class="form-outline mb-3">
            <label for="address" class="form-label">Indirizzo</label>
            <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" value="{{ old('address',$house->address) }}">           
            @error('address')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror    

        </div>
        <div class="form-outline w-25 mb-3">
            <label for="cover_image" class="form-label">Foto della casa</label>
            <input type="file" class="form-control @error('cover_image') is-invalid @enderror" id="cover_image" name="cover_image" value="{{ old('cover_image',$house->cover_image) }}">           
            @error('cover_image')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror    

        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Descrizione</label>
            <textarea type="text" class="form-control @error('description') is-invalid @enderror" id="description" name="description" value="{{ old('description',$house->description) }}" cols="30" rows="5"></textarea>
            @error('description')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror    
       
        </div>
        <div class="row">
            <div class="col-4">
                <div class="mb-3">
                    <label for="rooms" class="form-label">Stanze</label>
                    <input type="number" class="form-control @error('rooms') is-invalid @enderror" id="rooms" name="rooms" value="{{  old('rooms', $house->rooms) }}">
                    @error('rooms')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror    

                </div>
            </div>
            <div class="col-4">
                <div class="mb-3">
                    <label for="sq_meters" class="form-label">Metri quadri</label>
                    <input type="number" class="form-control @error('sq_meters') is-invalid @enderror" id="sq_meters" name="sq_meters" value="{{ old('sq_meters', $house->sq_meters) }}">
                    @error('sq_meters')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror    

                </div>                
            </div>
            <div class="col-4">
                <div class="mb-3">
                    <label for="beds" class="form-label">Letti</label>
                    <input type="number" class="form-control @error('beds') is-invalid @enderror" id="beds" name="beds" value="{{  old('beds', $house->beds) }}">
                    @error('beds')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror    
                </div>                
            </div>

            <div class="col-4">
                <div class="mb-3">
                    <label for="bathrooms" class="form-label">Bagni</label>
                    <input type="number" class="form-control @error('bathrooms') is-invalid @enderror" id="bathrooms" name="bathrooms" value="{{  old('bathrooms', $house->bathrooms) }}">
                    @error('bathrooms')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror    
                </div>                
            </div>

        </div>
        <div>
            <label for="extras" class="form-label">Servizi aggiuntivi</label>
            <div class="form-check @error('extras') is-invalid @enderror">
                <div class="row mt-3">
                    @foreach ($extras as $extra)
                    <div class="col">
                        <input type="checkbox" class="form-check-input" name="extras[]"
                        id="extra-{{$extra->id}}" value="{{$extra->id}}" @if(in_array($extra->id,
                        old('extras')?? [])) checked
                        @endif
                        >
                        <label class="form-check-label" for="extra-{{$extra->id}}">{{$extra->name}}</label>
                    </div>
                    @endforeach
                </div>
            </div>
            @error('extras')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>

        
      </div>
      <div class="card-footer text-end">
        <a href="{{ route('admin.houses.index')}}" class="btn btn-dark"><i class="fa-solid fa-arrow-left"></i>&nbsp;Cancel</a>
        <button type="submit" class="btn btn-success {{$btnClass}}"><i class="fa-solid fa-save"></i>&nbsp;Submit</button>
      </div>
    </div>
</form>
{{-- 
@section('script')
    @vite('resources/js/confirmDelete.js')
@endsection --}}