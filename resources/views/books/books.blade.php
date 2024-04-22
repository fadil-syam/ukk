@extends('layouts.app')
@section('content')
{{-- <h1>koleksi buku</h1> --}}

<h1 class="mb-5">{{ $tittle }}</h1>

@if ($books->count())

    <div class="card mb-3">
        <img src="https://source.unsplash.com/1200x400?{{ $books[0]->category->name }}" class="card-img-top" alt="...">
        <div class="card-body text-center">
            <h3 class="card-title"><a href="/books/{{ $books[0]->slug }}" class="text-decoration-none text-dark">{{ $books[0]->judul }}</a></h3>
            <p>
                {{-- <small class="text-body-secondary">
                    By. <a href="/authors/{{ $books[0]->author->username }}" class="text-decoration-none">{{ $books[0]->author->name }}</a> in <a href="/categories/{{ $books[0]->category->slug }}" class="text-decoration-none">{{ $books[0]->category->name }}</a> {{ $books[0]->created_at->diffForHumans() }}
                </small> --}}
            </p>

            <p class="card-text">{{ $books[0]->penerbit }}</p>

            <a href="/books/{{ $books[0]->slug }}" class="text-decoration-none btn btn-primary">Read more</a>

        </div>
    </div>
@else
    <p class="text-center fs-4">No post found.</p>
@endif

<div class="container">
    <div class="row">
        @foreach ($books as $post)
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="position-absolute px-3 py-2" style="background-color: rgba(0, 0, 0, 0.7)">
                        <a href="/categories/{{ $post->category->slug }}" class="text-white text-decoration-none">{{ $post->category->name }}</a>
                    </div>
                    <img src="{{ url('storage').'/'. $post->foto }}" class="card-img-top" style="max-width:500px; max-height:400px" alt="{{ $post->foto }}">
                    <div class="card-body">
                    <h5 class="card-title">{{ $post->judul }}</h5>
                    <p>
                        {{-- <small class="text-body-secondary">
                            By. <a href="/authors/{{ $post->author->username }}" class="text-decoration-none">{{ $post->author->name }}</a> {{ $post->created_at->diffForHumans() }}
                        </small> --}}
                    </p>
                    <p class="card-text">{{ $post->penerbit }}</p>
                    <a href="/books/{{ $post->slug }}" class="btn btn-primary">Read more</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

{{-- <div class="d-flex justify-content-end">
    {{ $books->links() }}
</div> --}}

@endsection


