<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Resource;

class SourcesController extends Controller
{
    /**
     * Menampilkan daftar sumber belajar milik user yang login.
     */
    public function Sources(Request $request)
    {
        $sortOrder = $request->get('sort', 'asc');

        $sources = Resource::where('user_id', auth()->id())
                           ->orderBy('nama', $sortOrder)
                           ->get();

        return view("sources", [
            'resources' => $sources,
            'currentSort' => $sortOrder
        ]);
    }

    /**
     * Menampilkan halaman form tambah data.
     */
    public function create()
    {
        return view("sources_create");
    }

    /**
     * Menyimpan data baru ke database.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string|max:1000',
            'sumber' => 'required|url|max:500',
        ]);

        Resource::create([
            'user_id'   => auth()->id(),
            'nama'      => $validated['nama'],
            'deskripsi' => $validated['deskripsi'],
            'sumber'    => $validated['sumber'],
        ]);

        return redirect('/Sources')->with('success', 'Sumber berhasil ditambahkan!');
    }

    /**
     * Menampilkan halaman edit data.
     */
    public function edit($id)
    {
        $resource = Resource::where('id', $id)
                            ->where('user_id', auth()->id())
                            ->firstOrFail();

        return view("sources_edit", ['resource' => $resource]);
    }

    /**
     * Memperbarui data yang sudah ada.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string|max:1000',
            'sumber' => 'required|url|max:500',
        ]);

        $item = Resource::where('id', $id)
                        ->where('user_id', auth()->id())
                        ->firstOrFail();

        $item->update([
            'nama' => $validated['nama'],
            'deskripsi' => $validated['deskripsi'],
            'sumber' => $validated['sumber'],
        ]);

        return redirect('/Sources')->with('success', 'Data berhasil diupdate!');
    }

    /**
     * Menghapus data secara aman.
     */
    public function destroy($id)
    {
        $item = Resource::where('id', $id)
                        ->where('user_id', auth()->id())
                        ->firstOrFail();
        $item->delete();

        return redirect('/Sources')->with('success', 'Data berhasil dihapus!');
    }
}