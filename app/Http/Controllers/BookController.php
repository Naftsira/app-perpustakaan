<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreBookRequest;

class BookController extends Controller
{
    private array $categories = [
    ['id'=> 1, 'nama_category'=> 'Fantasi'],
    ['id'=> 2, 'nama_category'=> 'Science'],
    ['id'=> 3, 'nama_category'=> 'History']
    ];

    private array $books = [
    ['id'=> 1, 'judul'=> 'Kimi no Nawa', 'penulis'=> 'Makoto Shinkai', 'penerbit'=> 'Kadokawa', 'tahun_terbit'=> 2016, 'isbn'=> '9784041026229', 'stok'=> 1, 'category_id'=> 1, 'category'=> 'fantasi'],
    ['id'=> 2, 'judul'=> 'Functional Thinking', 'penulis'=> 'Neal Ford', 'penerbit'=> 'O\'Reilly', 'tahun_terbit'=> 2014, 'isbn'=> null, 'stok'=> 3, 'category_id'=> 2, 'category'=> 'Science' ],
    ['id'=> 3, 'judul'=> 'The Rise and Fall of the Third Reich', 'penulis'=> 'William L. Shirer', 'penerbit'=> 'Simon & Schuster', 'tahun_terbit'=> 1990, 'isbn'=> null, 'stok'=> 3, 'category_id'=> 3, 'category'=> 'History']
    ];


    public function index()
    {
        $books = $this->books;
        return view('books.index', compact('books'));
    }
    public function create()
    {
        $categories = $this->categories;
        return view('books.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookRequest $request)
    {
        dd('Masuk Controller');
        $validated = $request->validated();
        return redirect()->route('books.index')->with('success', "Buku \"{$validated['judul']}\" berhasil ditambahkan (data dummy, belum tersimpan ke database).");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $book = collect($this->books)->firstWhere('id', (int) $id);
        abort_if(!$book, 404);
        return view('books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $book = collect($this->books)->firstWhere('id', (int) $id);

        abort_if(! $book, 404);

        $categories = $this->categories;

        return view('books.edit', compact('book', 'categories'));
    }

    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:200',
            'penulis' => 'required|string|max:100',
            'penerbit' => 'required|string|max:100',
            'tahun_terbit' => 'required|integer|min:1900|max:'.date('Y'),
            'isbn' => 'nullable|string|max:20',
            'stok' => 'required|integer|min:0',
            'category_id' => 'required|integer',
        ]);

        return redirect()->route('books.index')
            ->with('success', "Buku \"{$validated['judul']}\" berhasil diperbarui (data dummy, belum tersimpan ke database).");
    }

    public function destroy(string $id)
    {
        return redirect()->route('books.index')
            ->with('success', "Buku dengan id {$id} berhasil dihapus (data dummy, belum tersimpan ke database).");
    }
}
