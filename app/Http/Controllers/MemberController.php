<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMemberRequest;
use App\Models\Member;
use App\Http\Requests\ShowMemberDetail;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index()
    {
        $members = Member::when(request('search'), fn ($query, $search) => $query->where('nama', 'ilike', "%{$search}%"))
            ->orderBy('id')
            ->paginate(10);
        return view('members.index', compact('members'));
    }

    public function create()
    {
        $member = Member::all();
        return view('members.create');
    }

    public function store(StoreMemberRequest $request)
    {
        $validated = $request->validated();
        Member::create($validated);

        return redirect()->route('members.index')
            ->with('success', "Anggota \"{$validated['nama']}\" berhasil ditambahkan (data dummy, belum tersimpan ke database).");
    }

    public function show(ShowMemberDetail $request, string $id)
    {
        $member = Member::findOrFail($id);
        return view('members.show', compact('member'));
    }

    public function edit(string $id)
    {
        $member = Member::findOrFail($id);
        $members = Member::all();
        return view('members.edit', compact('member', 'members'));
    }

    public function update(Request $request, string $id)
    {
        $member = Member::findOrFail($id);
        $validated = $request->validate([
            'nama' => 'required|string|max:100',
            'nim' => 'required|string|max:20',
            'email' => 'required|email|max:100',
            'nomor_telepon' => 'required|string|max:20',
            'alamat' => 'required|string|max:255',
            'status' => 'required|in:aktif,nonaktif',
        ]);
        $member->update($validated);
        return redirect()->route('members.index')
            ->with('success', "Anggota \"{$validated['nama']}\" berhasil diperbarui.");
    }

    public function destroy(string $id)
    {
        $member = Member::findOrFail($id);
        $member->delete();
        return redirect()->route('members.index')
            ->with('success', "Anggota dengan id {$id} berhasil dihapus.");
    }
}
