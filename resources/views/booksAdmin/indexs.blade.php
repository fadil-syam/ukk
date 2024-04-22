@extends('layouts.app')
@section('content')

@if (session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
@if (session()->has('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<a href="/post/create" class="btn btn-primary mb-4">tambah data buku <i class="fas fa-fw fa-plus"></i></a>

@if ($books->count())


    <div class="form-group row">
        <div class="col-sm-12 mb-3 mb-sm-0">
            <div class="row">
                @foreach ($books as $book)
                <div class="card mb-4 mx-3" style="max-width: 18rem;">
                    <div class="row">
                    <div class="col-md-4 mb-3">
                        <img src="{{ url('storage').'/'. $book->foto }}" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">{{ $book->judul }}</h5>
                            <small>
                                <a href="/posts/{{ $books[0]->slug }}" class="me-2 fs-5 text-primary"><i class="bi bi-search"></i></a>
                                <a href="{{url('/edit/'.$book->slug)}}" class="mx-2 fs-5 text-success"><i class="bi bi-pencil-square"></i></a>
                                <form action="/delete/{{ $books[0]->slug }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn text-danger" onclick="return confirm('are you sure!!')"><i class="bi bi-trash-fill"></i></button>
                                </form>

                            </small>
                        </div>
                    </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

@else
    <p class="text-center fs-4">No post found.</p>
@endif


@endsection



