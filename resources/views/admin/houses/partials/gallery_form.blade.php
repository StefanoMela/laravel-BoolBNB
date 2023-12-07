{{-- New Gallery Upload Form --}}
<div class="container">
    <form action="{{ route('admin.gallery.upload', $house->id) }}" id="galleryForm" method="POST" class="my-2"
        enctype="multipart/form-data">
        @csrf
        <div class="card">
            <div class="card-header">
                <h2 class="text-center mb-2">Gallery Upload</h2>
            </div>
            <div class="card-body">
                {{-- Gallery Images --}}
                <div class="mb-3">
                    <label for="image" class="form-label">Gallery Images</label>
                    <input type="file" multiple class="form-control @error('image') is-invalid @enderror" id="image"
                        name="image[]" onchange="previewImages(event)">
                    @error('image')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                {{-- Image Preview Container --}}
                <div id="imagePreviewContainer" class="row mt-3"></div>
            </div>
            {{-- BTNS send gallery form and cancel --}}
            <div class="card-footer text-end my-2 d-flex justify-content-end gap-2">
                <button type="submit" class="btn btn-success"><i class="fa-solid fa-save"></i>&nbsp;Submit
                    Gallery</button>
            </div>
        </div>
    </form>
</div>

@section('scripts')
<script>
    function previewImages(event) {
        const previewContainer = document.getElementById('imagePreviewContainer');
        
        const files = event.target.files;
        for (const file of files) {
            const reader = new FileReader();

            reader.onload = function (e) {
                const imgContainer = document.createElement('div');
                imgContainer.className = 'image-container';
                
                const img = document.createElement('img');
                img.src = e.target.result;
                img.className = 'img-thumbnail m-2';
                
                imgContainer.appendChild(img);
                previewContainer.appendChild(imgContainer);
            };

            reader.readAsDataURL(file);
        }
    }
</script>

@endsection