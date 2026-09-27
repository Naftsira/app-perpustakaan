<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private array $categories = [
        ['id' => 1, 'nama_category' => 'Fantasi', 'deskripsi' => 'Buku cerita fantasi.'],
        ['id' => 2, 'nama_category' => 'Science', 'deskripsi' => 'Buku seputar teknologi, pemrograman, dan ilmu komputer.'],
        ['id' => 3, 'nama_category' => 'History', 'deskripsi' => 'Buku bertema sejarah dan biografi tokoh.'],
    ];

    public function index()
    {
        $categories = $this->categories;

        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(StoreCategoryRequest $request)
    {
        $validated = $request->validated();

        return redirect()->route('categories.index')->with('success', "Kategori \"{$validated['nama_category']}\" berhasil ditambahkan (data dummy, belum tersimpan ke database).");
    }

    public function edit(string $id)
    {
            $category = collect($this->categories)->firstWhere('id', (int) $id);

            abort_if(! $category, 404);

            $categories = $this->categories;

            return view('categories.edit', compact('category', 'categories'));
        }

    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'nama_category'=> 'required|string|max:100',
            'deskripsi'=> 'nullable|string'
        ]);

        return redirect()->route('categories.index')->with('success', "Kategori \"{$validated['nama_category']}\" berhasil diperbarui (data dummy, belum tersimpan ke database).");
    }

    public function destroy(string $id)
    {
        return "CategoryController@destroy, id: {$id}";
    }
}
