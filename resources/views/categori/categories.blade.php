@extends('layouts.app')
@section('content')

<h1 class="mb-5">{{ $tittle }}</h1>

<div class="container">
    <div class="row">
        @foreach ($categories as $category)
            <div class="col-md-4">
                <a href="/categories/{{ $category->slug }}">
                    <div class="card bg-dark text-white ">
                        <img src="img/undraw_rocket.svg" class="card-img" alt="{{ $category->name }}">
                        <div class="card-img-overlay d-flex align-items-center p-0">
                            <h5 class="card-title text-center flex-fiil p-4 f-3" style="background-color: rgba(0, 0, 0, 0.7)">{{ $category->name }}</h5>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</div>

{{-- <!-- https://source.unsplash.com/500x400?{{ $category->name }} --> --}}
@endsection
