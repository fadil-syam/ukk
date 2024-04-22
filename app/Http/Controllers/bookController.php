<?php

namespace App\Http\Controllers;

use App\Models\book;
use App\Models\borrow;
use App\Models\Category;
use App\Models\review;
use App\Models\User;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class bookController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    //user
    public function index()
    {
        $title = '';
        if(request('category')) {
            $category = Category::firstWhere('slug', request('category'));
            $title = ' in ' . $category->name;
        }

        if(request('author')) {
            $author = User::firstWhere('username', request('author'));
            $title = ' by ' . $author->name;
        }

        return view('books.books', [
            "tittle" => "All Posts",
            "active" => "home",
            "books" => book::all(),
            // "books" => book::latest()->filter(request(['search', 'category', 'author']))
            //         ->paginate(7)->withQueryString()
        ]);

    }

    public function show(book $book)
    {
        $reviews = Review::where('book_id', $book->id)->get();

        // $user_id = Auth::id();
        // $borrows = Borrow::where('user_id', $user_id)->with('book')->get();

        return view('books.book', [
            "title" => "Single Post",
            "active" => "home",
            "book" => $book,
            "user_id" => Auth::id(),
            // "users" => User::all(),
            // "borrows" => $borrows,
            "reviews" => $reviews,
        ]);

    }
    //end user


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // return view('booksAdmin.indexs', [
        //     "tittle" => "Tambah data buku",
        //     "active" => "create",
        //     "books" => book::all(),
        //     'categories' => Category::all(),
        // ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'judul' => 'required|min:3|max:30',
        //     'slug' => ['required', 'min:3', 'max:30', 'unique:books'],
        //     'penulis' => 'required',
        //     'penerbit' => 'required',
        //     'category_id' => 'required',
        //     // 'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        // ]);

        //     //untuk menambahkan file foto
        //     $foto_file = $request->file('foto');
        //     $foto_ekstensi = $foto_file->extension();
        //     //agar nama file tidak memiliki nama duplikat
        //     $foto_nama = date('ymdhis') . "." . $foto_ekstensi;
        //     $foto_file->move(public_path('foto'), $foto_nama);

        // $data = [
        //     'judul' => $request->input('judul'),
        //     'slug' => $request->input('slug'),
        //     'penulis' => $request->input('penulis'),
        //     'penerbit' => $request->input('penerbit'),
        //     'category_id' => $request->input('category_id'),
        //     'foto' => $foto_nama
        // ];
        // book::create();
        // return redirect('/create')->with('success', 'Buku berhasil ditambahkan!');

    }


    public function add()
    {
        // return view('booksAdmin.add', [
        //     "tittle" => "Tambah data buku",
        //     "active" => "create",
        //     "books" =>book::all(),
        //     "categories" => category::all(),
        // ]);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function view(book $book)
    {
        // return view('booksAdmin.view', [
        //     "tittle" => "Tambah data buku",
        //     "active" => "create",
        //     "book" => $book,
        // ]);
    }

    public function edit(book $book)
    {
        // return view('booksAdmin.edit', [
        //     "tittle" => "Tambah data buku",
        //     "active" => "create",
        //     "categories" => category::all(),
        //     "books" => $book,
        // ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, book $book, $id)
    {
        // $request->validate([
        //     'judul' => 'required|min:3|max:30',
        //     'penulis' => 'required',
        //     'penerbit' => 'required',
        //     'category_id' => 'required',
        // ]);

        // $data = [
        //     'judul' => $request->input('judul'),
        //     'penulis' => $request->input('penulis'),
        //     'penerbit' => $request->input('penerbit'),
        //     'category_id' => $request->input('category_id'),
        // ];

        // $book = Book::where('slug', $request->input('slug'))->first();

        // if ($book) {
        //     if ($book->slug != $request->slug) {
        //         $request->validate([
        //             'slug' => 'required|unique:books',
        //         ]);
        //     }

        //     if ($request->hasFile('foto')) {
        //         $request->validate([
        //             'foto' => 'mimes:jpeg,jpg,png,gif',
        //         ], [
        //             'foto.mimes' => 'Foto hanya diperbolehkan berekstensi jpeg, jpg, png, dan gif',
        //         ]);

        //         $foto_file = $request->file('foto');
        //         $foto_nama = date('ymdhis') . "." . $foto_file->extension();
        //         $foto_file->move(public_path('foto'), $foto_nama);

        //         // Hapus foto lama jika ada
        //         if ($book->foto) {
        //             File::delete(public_path('foto') . '/' . $book->foto);
        //         }

        //         $data['foto'] = $foto_nama;
        //     }

        //     // Perbarui data buku
        //     $book->update($data);
        //     return redirect('/create')->with('success', 'Berhasil melakukan update data');
        // } else {
        //     return redirect('/create')->with('error', 'Buku tidak ditemukan');
        // }


        // $request->validate([
        //     'judul' => 'required',
        //     'slug' => 'required|unique:books,slug,' . $id,
        //     'penulis' => 'required',
        //     'penerbit' => 'required',
        //     'category_id' => 'required',
        //     'foto' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Contoh validasi untuk file gambar
        // ]);

        // // Cari buku yang akan diupdate
        // $book = Book::findOrFail($id);

        // // Atur nilai atribut buku berdasarkan data dari form
        // $book->judul = $request->judul;
        // $book->slug = $request->slug;
        // $book->penulis = $request->penulis;
        // $book->penerbit = $request->penerbit;
        // $book->category_id = $request->category_id;

        // // Cek apakah ada file gambar yang diunggah
        // if ($request->hasFile('foto')) {
        //     // Simpan gambar yang diunggah ke direktori penyimpanan foto
        //     $foto = $request->file('foto');
        //     $nama_foto = date('YmdHis') . '.' . $foto->getClientOriginalExtension();
        //     $foto->move(public_path('foto'), $nama_foto);

        //     // Hapus foto lama jika ada
        //     if ($book->foto) {
        //         unlink(public_path('foto') . '/' . $book->foto);
        //     }

        //     // Atur nama file gambar baru ke atribut foto buku
        //     $book->foto = $nama_foto;
        // }

        // // Simpan perubahan data buku
        // $book->save();

        // // Redirect ke halaman tertentu dengan pesan sukses
        // return redirect('/create')->with('success', 'Buku berhasil diperbarui');

        // $request->validate([
        //     'judul' => 'required|min:3|max:30',
        //     'penulis' => 'required',
        //     'penerbit' => 'required',
        //     'category_id' => 'required',
        // ]);
        // $data = [
        //     'judul' => $request->input('judul'),
        //     'penulis' => $request->input('penulis'),
        //     'penerbit' => $request->input('penerbit'),
        //     'category_id' => $request->input('category_id'),
        // ];

        // if ($request->slug != $book->slug) {
        //     $rules['slug'] = 'required|unique:books';
        // }

        // if ($request->hasFile('foto')) {
        //     $request->validate([
        //         'foto' => 'mimes:jpeg,jpg,png,gif'
        //     ], [
        //         'foto.mimes' => 'Foto hanya diperbolehkan berekstensi jpeg, jpg, png, dan gif'
        //     ]);

        //     $foto_file = $request->file('foto');
        //     $foto_nama = date('ymdhis') . "." . $foto_file->extension();
        //     $foto_file->move(public_path('foto'), $foto_nama);

        //     // Hapus foto lama jika ada
        //     $data_foto = book::where('slug', $request->input('slug'))->first();
        //     if ($data_foto && $data_foto->foto) {
        //         File::delete(public_path('foto') . '/' . $data_foto->foto);
        //     }

        //     $data['foto'] = $foto_nama;
        // }

        // // Perbarui data buku
        // book::where('slug', $request->input('slug'))->update($data);
        // return redirect('/create')->with('success', 'Berhasil melakukan update data');

        // $rules = [
        //     'judul' => 'required|min:3|max:30',
        //     'penulis' => 'required',
        //     'penerbit' => 'required',
        //     'category_id' => 'required',
        //     'foto' => 'image|file|max:1024',
        // ];

        // if ($request->slug != $book->slug) {
        //     $rules['slug'] = 'required|unique:books';
        // }

        // $validateData = $request->validate($rules);

        // if($request->file('foto')) {
        //     $validateData['foto'] = $request->file('foto')->store('')
        // }

        // book::where('id', $book->id)
        //     ->update($validateData);

        // return redirect('/create')->with('success', 'Berhasil melakukan update data');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(book $book)
    {
        // if($book->foto) {
        //     Storage::delete($book->foto);
        // }
        // book::destroy($book->id);
        // return redirect('/create')->with('success', 'post has been deleted!');
    //     $data = Book::where('slug', $book->slug)->first();

    //     if ($data) {
    //         // Hapus foto jika ada
    //         if ($data->foto) {
    //             File::delete(public_path('foto').'/'.$data->foto);
    //         }

    //         // Hapus entri buku
    //         $data->delete();

    //         return redirect('/create')->with('success', 'Buku berhasil dihapus');
    //     }

    //     // Jika buku tidak ditemukan, langsung arahkan kembali dengan pesan sukses
    //     return redirect('/create')->with('success', 'Buku berhasil dihapus');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(book::class, 'slug', $request->judul);
        return response()->json(['slug' => $slug]);
    }
}
