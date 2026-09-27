@extends('layouts.app')

@section('title', 'Tambah Kategori')

@section('content')
    <h1>Tambah Kategori</h1>
    <p><a href="{{ route('categories.index') }}">&larr; Kembali ke daftar kategori</a></p>

    <form action="{{ route('categories.store') }}" method="POST">
        @csrf

        <label for="nama_category">Nama Kategori</label>
        <input type="text" name="nama_category" id="nama_category" value="{{ old('nama_category') }}">
        @error('nama_category')
            <div class="error">{{ $message }}</div>
        @enderror

        <label for="deskripsi">Deskripsi (opsional)</label>
        <textarea name="deskripsi" id="deskripsi" rows="4">{{ old('deskripsi') }}</textarea>
        @error('deskripsi')
            <div class="error">{{ $message }}</div>
        @enderror

        <button type="submit" class="btn">Simpan</button>
    </form>
</body>
</html>
@endsection
