@extends('layouts.app')
@section('content')

<!-- As a heading -->
<nav class="navbar navbar-light bg-white">
    <div class="container">
    <span class="navbar-brand mb-0 h1"><a href="/">All Post</a> -> <a href="#">{{ $title }} - { {{ $book->judul }} }</a></span>
    </div>
</nav>
<br><br>
<div class="container">
    <div class="row justify-content-center mb-5">
        <div class="col-md-8">

            {{-- <a href="/" class="d-block mt-3">back</a> --}}
            {{-- <h2 class="mb-3">{{ $book->tittle }}</h2> --}}

            {{-- <p>By. <a href="/authors/{{ $book->author->username }}" class="text-decoration-none">{{ $book->author->name }}</a> in <a href="/categories/{{ $book->category->slug }}" class="text-decoration-none">{{ $book->category->name }}</a></p> --}}

            <img src="{{ url('storage').'/'. $book->foto }}" class="card-img-top" style="max-width:500px; max-height:400px" alt="no pos" class="img-fluid">

            <article class="my-3 fs-5">
                <h2 class="my-0">judul: {!! $book->judul !!}</h2>
                <p class="my-0">penulis: {!! $book->penulis !!}</p>
                <p class="my-0">penerbit: {!! $book->penerbit !!}</p>

            </article>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                Pinjam Buku
            </button>

            @foreach ($reviews as $review)
            @php
                $user = App\Models\User::find($review->user_id); // Temukan pengguna yang sesuai dengan user_id ulasan
            @endphp
                <tr>
                    <td>
                        <div class="form-floating mb-4">
                            <textarea class="form-control" id="floatingTextarea2" style="height: 100px" disabled>{{ $review->ulasan }}</textarea>
                            <label for="floatingTextarea2 "><i class="bi bi-person-circle fs-5"></i><i class="text-dark ms-2 fs-5">{{ $user->username }}
                                @for ($i = 1; $i <= 5; $i++)
                                    @if ($review->rating >= $i)
                                        <i class="bi bi-star-fill text-warning"></i>
                                    @else
                                        <i class="bi bi-star"></i>
                                    @endif
                                @endfor
                            </i>
                            </label>
                        </div>
                    </td>
                </tr>
            @endforeach

        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form method="post" action="/borrows">
            @csrf

            <div class="modal-body">
                {{-- <div class="form-group">
                    <label for="user_id">user_id:</label>
                </div>
                <div class="form-group">
                    <label for="book_id">book_id:</label>
                </div> --}}
                <input type="hidden" id="user_id" value="{{ $user_id }}" name="user_id" class="form-control" readonly required>
                <input type="hidden" id="book_id" value="{{ $book->id }}" name="book_id" class="form-control" readonly required>

                <div class="form-group">
                    <label for="tanggal_peminjaman">Tanggal Peminjaman:</label>
                    <input type="date" id="TanggalPeminjaman" value="{{ date('Y-m-d') }}" name="TanggalPeminjaman" class="form-control" readonly required>
                </div>

                <div class="form-group">
                    <label for="tanggal_pengembalian">Tanggal Pengembalian:</label>
                    <input type="date" id="TanggalPengembalian" name="TanggalPengembalian" class="form-control" required>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Pinjam</button>
            </div>
        </form>


      </div>
    </div>
  </div>

@endsection


