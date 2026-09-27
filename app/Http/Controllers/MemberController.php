<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMemberRequest;
use App\Http\Requests\ShowMemberDetail;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    private array $members = [
        ['id' => 1, 'nama' => 'Naftali', 'nim' => '3125600106', 'email' => 'naft@pens.com', 'nomor_telepon' => '081234567890', 'alamat' => 'Kalisari Damen', 'status' => 'aktif'],
        ['id' => 2, 'nama' => 'Giovan', 'nim' => '31256000105', 'email' => 'van@pens.com', 'nomor_telepon' => '081234567891', 'alamat' => 'Surabaya', 'status' => 'aktif'],
        ['id' => 3, 'nama' => 'Adaffa', 'nim' => '3125600100', 'email' => 'daf@pens.com', 'nomor_telepon' => '081234567892', 'alamat' => 'TMB', 'status' => 'aktif'],
    ];

    public function index()
    {
        $members = $this->members;
        return view('members.index', compact('members'));
    }

    public function create()
    {
        return view('members.create');
    }

    public function store(StoreMemberRequest $request)
    {
        $validated = $request->validated();

        return redirect()->route('members.index')
            ->with('success', "Anggota \"{$validated['nama']}\" berhasil ditambahkan (data dummy, belum tersimpan ke database).");
    }

    public function show(ShowMemberDetail $request, string $id)
    {
        $member = collect($this->members)->firstWhere('id', (int) $id);
        abort_if(!$member, 404);
        return view('members.show', compact('member'));
    }

    public function edit(string $id)
    {
        $member = collect($this->members)->firstWhere('id', (int) $id);
        abort_if(!$member, 404);
        return view('members.edit', compact('member'));
    }

    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:100',
            'nim' => 'required|string|max:20',
            'email' => 'required|email|max:100',
            'nomor_telepon' => 'required|string|max:20',
            'alamat' => 'required|string|max:255',
            'status' => 'required|in:aktif,nonaktif',
        ]);

        return redirect()->route('members.index')
            ->with('success', "Anggota \"{$validated['nama']}\" berhasil diperbarui (data dummy, belum tersimpan ke database).");
    }

    public function destroy(string $id)
    {
        return redirect()->route('members.index')
            ->with('success', "Anggota dengan id {$id} berhasil dihapus (data dummy, belum tersimpan ke database).");
    }
}
