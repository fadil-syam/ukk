@extends('layouts.app')
@section('content')

{{-- @auth
    <p>User ID: {{ Auth::id() }}</p>
    @else
    <p>Silakan login untuk melihat User ID.</p>
    @endauth --}}



    {{-- <h1>{{ $title }}</h1> --}}
    <div class="mb-3"><a href="{{ url("borrows/export/excel") }}">buat laporan</a></div>
    @include('borrows.export',$borrows)

  <script>
    let selectedRating = 0; // Variabel untuk menyimpan nilai rating yang dipilih

    function handleStarClick(rating) {
        // Menyimpan nilai rating yang dipilih
        selectedRating = rating;

        // Mengubah warna ikon bintang
        for (let i = 1; i <= 5; i++) {
            const star = document.getElementById(`star${i}`);
            if (i <= rating) {
                star.innerHTML = '<i class="bi bi-star-fill text-primary" onclick="handleStarClick(' + i + ')"></i>';
            } else {
                star.innerHTML = '<i class="bi bi-star" onclick="handleStarClick(' + i + ')"></i>';
            }
        }

        // Memperbarui nilai input tersembunyi
        document.getElementById('ratingInput').value = rating;

        // Di sini Anda dapat memperbarui nilai di backend atau melakukan tindakan lain sesuai kebutuhan
        console.log('Rating selected:', rating);
    }
</script>

@endsection
