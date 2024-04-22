@extends('layouts.app')
@section('content')

<form class="user" method="post" action="/post" enctype="multipart/form-data">
    @csrf
    <div class="form-group row">
        <div class="col-sm-4 mb-3 mb-sm-0">
            <input type="text" class="form-control form-control-user" placeholder="id" disabled>
        </div>
        <div class="col-sm-4 mb-3 mb-sm-0">
            <input type="text" class="form-control form-control-user @error('judul') is-invalid @enderror"
                name="judul" id="judul" placeholder="judul" value="{{ old('judul') }}">
                @error('judul')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
        </div>
        <div class="col-sm-4 mb-3 mb-sm-0">
            <input type="text" class="form-control form-control-user @error('slug') is-invalid @enderror" name="slug" id="slug" placeholder="slug" required value="{{ old('slug') }}">
            @error('slug')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>


    <div class="form-group row">
        <div class="col-sm-6 mb-3 mb-sm-0">
            <input type="text" class="form-control form-control-user @error('penulis') is-invalid @enderror"
                name="penulis" placeholder="penulis" value="{{ old('penulis') }}">
                @error('penulis')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
        </div>
        <div class="col-sm-6 mb-3 mb-sm-0">
            <input type="text" class="form-control form-control-user @error('penerbit') is-invalid @enderror"
                name="penerbit" placeholder="penerbit" value="{{ old('penerbit') }}">
                @error('penerbit')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
        </div>
    </div>
    <div class="form-group row">
        
        <div class="col-sm-6 mb-3 mb-sm-0">
            <img class="img-preview img-fluid mb-3 col-sm-5" src="" style="display: none;">
            <input type="file" class="form-control form-control-lg form-control-user @error('foto') is-invalid @enderror"
                id="image" name="foto" value="{{ old('foto') }}" onchange="previewImage()">
            @error('foto')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="col-sm-6 mb-3 mb-sm-0">
            <select class="form-select form-select-sm form-control-user" id="category" name="category_id">
                @foreach ($categories as $category)
                    @if (old('category_id') == $category->id )
                        <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                    @else
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endif
                @endforeach
            </select>
        </div>
    </div>
    <button class="btn btn-primary">tambah data</button>
    <hr>

</form>

<script>
    const judul = document.querySelector('#judul');
    const slug = document.querySelector('#slug');

    judul.addEventListener('change', function(){
        fetch('/checkSlug?judul=' + judul.value)
            .then(response => response.json() )
            .then(data => slug.value = data.slug)
    });

    document.addEventListener('trix-file-accept', function(e) {
        e.preventDefault();
    })


    //
    function previewImage() {
    const image = document.getElementById('image');
    const imgPreview = document.querySelector('.img-preview');

    imgPreview.style.display = 'block';

    const oFReader = new FileReader();
    oFReader.readAsDataURL(image.files[0]);

    oFReader.onload = function(oFREvent) {
        imgPreview.src = oFREvent.target.result;
        }
    }

    // function previewImage() {
    //     const image = document.querySelector('image');
    //     const imgPreview = document.querySelector('.img-preview');

    //     imgPreview.style.display = 'block';

    //     const oFReader = new FileReader();
    //     oFReader.readAsDataURL(image.files[0]);

    //     oFReader.onload = function(oFREvent) {
    //         imgPreview.src = oFREvent.target.result;
    //     }
    // }

</script>
@endsection
