@extends('layouts.app')

@section('title', 'Detail Anggota '.$member['nama'])

@section('content')
    <h1>Detail Anggota {{$member['nama']}}</h1>
    <p><a href="{{ route('members.index') }}">&larr; Kembali ke daftar members</a></p>

    <table>
        <tr>
            <th>Nama</th>
            <td>{{ $member['nama'] }}</td>
        </tr>
        <tr>
            <th>NIM</th>
            <td>{{ $member['nim'] }}</td>
        </tr>
        <tr>
            <th>Email</th>
            <td>{{ $member['email'] }}</td>
        </tr>
        <tr>
            <th>No. Telp</th>
            <td>{{ $member['nomor_telepon'] }}</td>
        </tr>
        <tr>
            <th>Alamat</th>
            <td>{{ $member['alamat'] ?? '-' }}</td>
        </tr>
        <tr>
            <th>Status</th>
            <td>{{ $member['status'] }}</td>
        </tr>
    </table>
@endsection
