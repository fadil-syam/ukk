<?php

namespace App\Http\Controllers;

use App\Models\book;
use App\Models\Category;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class bookPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('booksAdmin.indexs', [
            "tittle" => "Tambah data buku",
            "active" => "create",
            "books" => book::all(),
            // 'categories' => Category::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('booksAdmin.add', [
            "tittle" => "Tambah data buku",
            "active" => "create",
            "books" =>book::all(),
            "categories" => category::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'judul' => 'required|min:3|max:30',
            'slug' => ['required', 'min:3', 'max:30', 'unique:books'],
            'penulis' => 'required',
            'penerbit' => 'required',
            'category_id' => 'required',
            'foto' => 'image|file|max:1024',
        ]);

        if($request->file('foto')) {
            $validatedData['foto'] = $request->file('foto')->store('post-images');
        }



        book::create($validatedData);

        return redirect('post')->with('success', 'new posts has been added');

    }

    /**
     * Display the specified resource.
     */
    public function show(book $book)
    {
        return view('booksAdmin.view', [
            "tittle" => "Tambah data buku",
            "active" => "create",
            "book" => $book,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(book $book)
    {


        return view('booksAdmin.edit', [
            "tittle" => "Tambah data buku",
            "active" => "create",
            "categories" => category::all(),
            "book" => $book,
            
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, book $book)
    {
        $rules = [
            'category_id' => 'required',
            'judul' => 'required|max:255',
            'penulis' => 'required|max:255',
            'penerbit' => 'required|max:255',
            'foto' => 'image|file|max:1024',
        ];

        if($request->slug != $book->slug) {
            $rules['slug'] = 'required|unique:books';
        }

        $validatedData = $request->validate($rules);

        if($request->file('foto')) {
            if($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['foto'] = $request->file('foto')->store('post-images');
        }

        book::where('id', $book->id)
            ->update($validatedData);

        return redirect('/post')->with('success', 'posts has been update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(book $book)
    {
        if($book->foto) {
            Storage::delete($book->foto);
        }
        book::destroy($book->id);
        return redirect('/post')->with('success', 'post has been deleted!');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(book::class, 'slug', $request->judul);
        return response()->json(['slug' => $slug]);
    }
}

