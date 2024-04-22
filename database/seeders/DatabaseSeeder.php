<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\book;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'name' => 'petugas',
            'username' => 'petugas',
            'email' => 'petugas@gmail.com',
            'alamat' => 'Lorem ipsum dolor sit',
            'password' => bcrypt('12345'),
            'is_admin' => 1,
        ]);
        User::create([
            'name' => 'admin',
            'username' => 'administrator',
            'email' => 'admin@gmail.com',
            'alamat' => 'Lorem ipsum dolor sit',
            'password' => bcrypt('12345'),
            'is_admin' => 1,
        ]);
        User::create([
            'name' => 'fadil ',
            'username' => 'alfadil',
            'email' => 'syamsudinfadil08@gmail.com',
            'alamat' => 'Lorem ipsum dolor sit',
            'password' => bcrypt('12345'),
        ]);
        User::create([
            'name' => 'syam ',
            'username' => 'assyaam',
            'email' => 'fadilsyamsudinmuhamad@gmail.com',
            'alamat' => 'Lorem syam dolor sit',
            'password' => bcrypt('12345'),
        ]);
        User::create([
            'name' => 'sri ',
            'username' => 'assri',
            'email' => 'fadilsyam48@gmail.com',
            'alamat' => 'Lorem sri dolor sit',
            'password' => bcrypt('12345'),
        ]);

        Category::create([
            'name' => 'Belajar',
            'slug' => 'belajar',
        ]);

        Category::create([
            'name' => 'Komik',
            'slug' => 'komik',
        ]);

        Category::create([
            'name' => 'Pendidikan',
            'slug' => 'pendidikan',
        ]);
        Category::create([
            'name' => 'Kesehatan',
            'slug' => 'Kesehatan',
        ]);

        Category::create([
            'name' => 'Sejarah',
            'slug' => 'sejarah',
        ]);

        Category::create([
            'name' => 'Hiburan',
            'slug' => 'hiburan',
        ]);

        // book::create([
        //     'category_id' => 1,
        //     'user_id' => 1,
        //     'slug' => 'buku-pertama',
        //     'judul' => 'Buku Pertama',
        //     'penulis' => 'Lorem ipsum dolor sit.',
        //     'penerbit' => 'Lorem ipsum, 2019',
        // ]);
        // book::create([
        //     'category_id' => 3,
        //     'user_id' => 2,
        //     'slug' => 'bahasa-indonesia',
        //     'judul' => 'Bahasa Indonesia',
        //     'penulis' => 'nadiem',
        //     'penerbit' => 'detik, 2010',
        // ]);
        // book::create([
        //     'category_id' => 3,
        //     'user_id' => 2,
        //     'slug' => 'bahasa-inggris',
        //     'judul' => 'Bahasa Inggris',
        //     'penulis' => 'teacher',
        //     'penerbit' => 'times, 2015',
        //     'foto' => '2.jpg'
        // ]);
        // book::create([
        //     'category_id' => 3,
        //     'user_id' => 3,
        //     'slug' => 'bahasa-jepang',
        //     'judul' => 'Bahasa Jepang',
        //     'penulis' => 'sensei',
        //     'penerbit' => 'jav, 2020',
        //     'foto' => '1.jpg'
        // ]);

    }

}
