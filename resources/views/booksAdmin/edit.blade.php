@extends('layouts.app')
@section('content')




<div class="container">
    <div class="card mb-3" style="max-width: 900px;">
        <div class="row g-0">
          <div class="col-md-4">
            <img src="{{ url('storage').'/'. $book->foto }}" id="foto" class="img-fluid rounded-start" alt="...">
          </div>
          <div class="col-md-8">
            <div class="card-body">
                <form class="user" method="post" action="{{url('/update/'.$book->slug)}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group row">
                        <div class="col-sm-10 mb-3 mb-sm-0">
                            <label for="judul">judul :</label>
                            <input type="text" class="form-control form-control-user @error('judul') is-invalid @enderror"
                                value="{{ old('judul', $book->judul) }}"  name="judul" id="judul">
                            @error('judul')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10 mb-3 mb-sm-0">
                            <label for="slug">slug :</label>
                            <input type="text" class="form-control form-control-user @error('slug') is-invalid @enderror"
                                value="{{ old('slug', $book->slug) }}" name="slug" id="slug">
                            @error('slug')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10 mb-3 mb-sm-0">
                            <label for="penulis">penulis :</label>
                            <input type="text" class="form-control form-control-user @error('penulis') is-invalid @enderror"
                                value="{{ $book->penulis }}" name="penulis" id="penulis">
                            @error('penulis')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10 mb-3 mb-sm-0">
                            <label for="penerbit">penerbit :</label>
                            <input type="text" class="form-control form-control-user @error('penerbit') is-invalid @enderror"
                                value="{{ $book->penerbit }}" name="penerbit" id="penerbit">
                            @error('penerbit')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10 mb-3 mb-sm-0">
                            <label for="category">category</label>
                            <select class="form-select form-select-sm form-control-user @error('category_id') is-invalid @enderror"
                                id="category" name="category_id">
                                @foreach ($categories as $category)
                                    @if (old('category_id', $book->category_id) == $category->id)
                                        <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                                    @else
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>

                                    @endif
                                @endforeach
                            </select>
                            @error('category_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">

                        <div class="col-sm-10 mb-3 mb-sm-0">
                            @if ($book->foto)
                                <img src="{{ url('storage').'/'. $book->foto }}" class="img-preview img-fluid mb-3 col-sm-5" alt="fff">

                            @else
                                <img class="img-preview img-fluid mb-3 col-sm-5">

                            @endif
                            <input type="file" class="form-control form-control-lg form-control-user @error('foto') is-invalid @enderror"
                                id="image" name="foto" onchange="previewImage()">
                            @error('foto')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <button class="btn btn-primary">ubah data</button>
                </form>
            </div>
          </div>
        </div>
      </div>
</div>

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

</script>

@endsection


{{-- <div class="col-lg-8">
    <form method="POST" action="/" enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="mb-3">
          <label for="judul" class="form-label">judul</label>
          <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" name="judul" required autofocus value="{{ old('judul', $book->judul) }}">
            @error('judul')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
          <label for="slug" class="form-label">slug</label>
          <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" readonly required value="{{ old('slug', $book->slug) }}">
            @error('slug')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
          <label for="category" class="form-label">category</label>
          <select class="form-select" id="category" name="category_id">
            @foreach ($categories as $category)
                @if (old('category_id', $book->category_id ) == $category->id )
                    <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                @else
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endif
            @endforeach
          </select>
        </div>
        <div class="mb-3">
            <div class="mb-3">
                <label for="image" class="form-label">post image</label>
                <input type="hidden" name="oldImage" value="{{ $book->image }}">
                @if ($book->image)
                    <img src="{{ asset('storage/' . $book->image) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
                @else
                    <img class="img-preview img-fluid mb-3 col-sm-5">
                @endif
                <input class="form-control" type="file" id="image" name="image" @error('image') is-invalid @enderror onchange="previewImage()">
                @error('image')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="mb-3">
          <label for="body" class="form-label">body</label>
            @error('body')
                <p class="text-danger">{{ $message }}</p>
            @enderror
          <input id="body" type="hidden" name="body" value="{{ old('body', $book->body) }}">
          <trix-editor input="body"></trix-editor>
        </div>

        <button type="submit" class="btn btn-primary">update posts</button>
    </form>
</div>
</div> --}}
