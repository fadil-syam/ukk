<?php

namespace App\Http\Controllers;

use App\Models\book;
use App\Models\borrow;
use App\Models\review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class reviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user_id = Auth::id(); // Dapatkan user_id yang sedang login
        $reviews = review::where('user_id', $user_id)->with('book')->get(); // Ambil borrows berdasarkan user_id
        // $book = book::where('slug')->firstOrFail();

        return view('reviws.review', [
            'tittle' => 'my reviews',
            'active' => 'reviews',
            'reviews' => $reviews,
            "books" => book::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $reviewData = [
            'user_id' => $request->input('user_id'),
            'book_id' => $request->input('book_id'),
            'ulasan' => $request->input('ulasan'),
            'rating' => $request->input('rating'),
        ];

        // Menyimpan ulasan baru
        review::create($reviewData);
        // borrow::create($status);


        // Memperbarui status peminjaman hanya jika StatusPeminjaman diberikan
        // if ($request->has('StatusPeminjaman')) {
        //     borrow::where('book_id', $request->input('book_id'))
        //         ->update(['StatusPeminjaman' => $request->input('StatusPeminjaman')]);
        // }

        return redirect("/borrows")->with('success', 'Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(review $review)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(review $review)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, review $review)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(review $review)
    {

        review::destroy($review->id);
        return redirect('/reviews')->with('success', 'post has been deleted!');
    }
}
