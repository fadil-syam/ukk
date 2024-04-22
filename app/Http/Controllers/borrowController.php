<?php

namespace App\Http\Controllers;

use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ExportPeople;
use App\Models\book;
use App\Models\borrow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class borrowController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user_id = Auth::id(); // Dapatkan user_id yang sedang login
        $borrows = Borrow::where('user_id', $user_id)->with('book')->get(); // Ambil borrows berdasarkan user_id dan mengambil relasi buku

        // Loop melalui setiap peminjaman
        // foreach ($borrows as $borrow) {
        //     // Periksa nilai StatusPeminjaman
        //     if ($borrow->StatusPeminjaman == 1) {
        //         // Jika sudah dikembalikan, setel menjadi 1
        //         $borrow->StatusPeminjaman = 1;
        //     } else {
        //         // Jika belum dikembalikan, setel menjadi 0
        //         $borrow->StatusPeminjaman = 0;
        //     }

        //     // Simpan perubahan ke database
        //     $borrow->save();
        // }

        return view('borrows.indexs', [
            "title" => "Koleksi Buku",
            "active" => "borrows",
            "borrows" => $borrows,
            "books" => Book::all(), // Mengambil semua buku
        ]);
    }


    /**
     * Show the form for creating a new resource.
     */

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = [
            'user_id' => $request->input('user_id'),
            'book_id' => $request->input('book_id'),
            'TanggalPeminjaman' => $request->input('TanggalPeminjaman'),
            'TanggalPengembalian' => $request->input('TanggalPengembalian'),
        ];


        borrow::create($data);
        return redirect('')->with('success', 'Data berhasil disimpan');
    }


    //
    public function status(Request $request, $id)
    {
        $data = [
            'StatusPeminjaman' => $request->input('StatusPeminjaman'),
        ];

        // Lakukan update pada baris dengan id yang sesuai
        borrow::where('id', $id)
            ->update($data);

        return redirect("/borrows")->with('success', 'permintaanmu akan segera kami konfirmasi');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = ['StatusPeminjaman' => 2]; // Nilai baru yang ingin di-update

        borrow::where('id', $id) // Tentukan id yang ingin di-update
            ->update($data); // Lakukan update pada kolom StatusPeminjaman


        // // Memperbarui status peminjaman hanya jika StatusPeminjaman diberikan
        // if ($request->has('StatusPeminjaman')) {
        //     borrow::where('book_id', $request->input('book_id'))
        //         ->update(['StatusPeminjaman' => $request->input('StatusPeminjaman')]);
        // }

        return redirect()->back()->with('success', 'Status berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }



    function exsport_excel()
    {
        return Excel::download(new ExportPeople, "borrows.xlsx");
    }


    /**
     * Display the specified resource.
     */
    public function showAdmin()
    {
        // $user_id = Auth::id(); // Dapatkan user_id yang sedang login
        // $borrows = Borrow::where('user_id', $user_id)->with('book')->get(); // Ambil borrows berdasarkan user_id dan mengambil relasi buku
        // $borrows = borrow::all(); // Ambil borrows berdasarkan user_id dan mengambil relasi buku

        // Loop melalui setiap peminjaman
        // foreach ($borrows as $borrow) {
        //     // Periksa nilai StatusPeminjaman
        //     if ($borrow->StatusPeminjaman == 1) {
        //         // Jika sudah dikembalikan, setel menjadi 1
        //         $borrow->StatusPeminjaman = 1;
        //     } else {
        //         // Jika belum dikembalikan, setel menjadi 0
        //         $borrow->StatusPeminjaman = 0;
        //     }

        //     // Simpan perubahan ke database
        //     $borrow->save();
        // }

        return view('borrows.borrowAdmin', [
            "title" => "data Buku yang di pinjam",
            "active" => "borrowsAdmin",
            "borrows" => borrow::all(),
            // "books" => Book::all(), // Mengambil semua buku
        ]);
    }


}
