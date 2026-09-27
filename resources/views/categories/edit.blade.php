@extends('layouts.app')

@section('title', 'Edit Kategori '.$category['nama_category'])

@section('content')
    <h1>Edit Kategori {{ $category['nama_category'] }}</h1>
    <p><a href="{{ route('categories.index') }}">&larr; Kembali ke daftar kategori</a></p>

    <form action="{{ route('categories.update', $category['id']) }}" method="POST">
        @csrf
        @method('PUT')

        <select name="category_id" id="category_id">
            <option value="">-- Pilih Kategori --</option>
            @foreach ($categories as $cat)
                <option value="{{ $cat['id'] }}" @selected(old('category_id', $category['id']) == $cat['id'])>
                    {{ $cat['nama_category'] }}
                </option>
            @endforeach
        </select>
        @error('category_id')
            <div class="error">{{ $message }}</div>
        @enderror

        <label for="deskripsi">Deskripsi (Opsional)</label>
        <input type="text" name="deskripsi" id="deskripsi" value="{{ old('deskripsi', $category['deskripsi']) }}">
        @error('deskripsi')
            <div class="error">{{ $message }}</div>
        @enderror

        <button type="submit" class="btn">Perbarui</button>
    </form>
@endsection
