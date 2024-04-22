@extends('layouts.app')
@section('content')

@if (session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<h1>{{ $tittle }}</h1>
<br>

@if ($reviews->count())

@foreach ($reviews as $review)
    @php
        $user = App\Models\User::find($review->user_id); // Temukan pengguna yang sesuai dengan user_id ulasan
    @endphp
@endforeach

<table class="table">
    <thead>
        <tr>
            <th>No</th>
            <th>book id judul</th>
            <th>rating</th>
            <th>ulasan</th>
            <th>aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($reviews as $review)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>
                @if ($review->book)
                    {{ $review->book_id . $review->book->judul }}
                @else
                    <i class="text-warning">buku tidak tersedia</i>
                @endif
            </td>

            <td>
                @for ($i = 1; $i <= 5; $i++)
                    @if ($review->rating >= $i)
                        <i class="bi bi-star-fill text-warning"></i>
                    @else
                        <i class="bi bi-star"></i>
                    @endif
                @endfor
            </td>
            <td>
                {{ $review->ulasan }}
            </td>
            <td>
                <form action="{{ '/reviews/'.$review->id }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('apakah anda serius ingin menghapus ulasan ini!!')"><i class="bi bi-trash-fill"></i></button>
                </form>
            </td>


        </tr>
        @endforeach
    </tbody>
</table>






@else
    <p class="text-center fs-4">No post found.</p>
@endif


@endsection
