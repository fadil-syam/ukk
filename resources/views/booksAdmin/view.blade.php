@extends('layouts.app')
@section('content')

<div class="container">
    <div class="card mb-3" style="max-width: 900px;">
        <div class="row g-0">
          <div class="col-md-4">
            <img src="{{ url('storage').'/'. $book->foto }}" class="img-fluid rounded-start" alt="hh">
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title">judul: {!! $book->judul !!}</h5>
              <p class="card-text">slug: {!! $book->slug !!}</p>
              <p class="card-text">penulis: {!! $book->penulis !!}</p>
              <p class="card-text">penerbit: {!! $book->penerbit !!}</p>
              <p class="card-text">penerbit: {!! $book->penerbit !!}</p>
              <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
            </div>
          </div>
        </div>
      </div>
</div>

@endsection
