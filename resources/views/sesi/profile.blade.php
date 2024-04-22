@extends('layouts.app')
@section('content')

<div class="container">
    <div class="card mb-3" style="max-width: 900px;">
        <div class="row g-0">

            <div class="col-md">
              <h2 class="mb-3">{{ $user->title }}</h2>
            <div class="card-body">
                <h5 class="card-title">name: {!! $user->name !!}</h5>
                <p class="card-text">username: {!! $user->username !!}</p>
                <p class="card-text">email: {!! $user->email !!}</p>
                <p class="card-text">alamat: {!! $user->alamat !!}</p>
                <p class="card-text">status:
                    @if($user->is_admin == 1)
                        admin
                    @else
                        user
                    @endif
                </p>

            </div>

          </div>
        </div>
      </div>
</div>

@endsection
