<table class="table">
    <thead>
        <tr>
            <th>No</th>
            <th>judul</th>
            <th>email peminjam</th>
            <th>Peminjaman</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($borrows as $borrow)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>
                @if ($borrow->book)
                    {{ $borrow->book_id . $borrow->book->judul }}
                @else
                    <i class="text-warning">buku tidak tersedia</i>
                @endif
            </td>
            <td>
                @if ($borrow->user)
                    {{ $borrow->user->email }}
                @else
                    <i class="text-warning">buku tidak tersedia</i>
                @endif
            </td>

            {{-- <td>{{ $borrow->book_id . $borrow->book->judul }}</td> --}}
            <td>{{ $borrow->TanggalPeminjaman }} - {{ $borrow->TanggalPengembalian }}</td>
            <td>
                @if($borrow->StatusPeminjaman == 1)
                    <form action="{{url('/tambah/'.$borrow->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <button class="btn btn-sm btn-primary" value="2" name="StatusPeminjaman" type="submit">acc pengembalian</button>
                    </form>
                @elseif($borrow->StatusPeminjaman == 2)
                    <i class="text-secondary">sudah dikembalikan</i>
                @else
                    belum dikembalikan
                @endif


            </td>
        </tr>
        @endforeach
    </tbody>
</table>
