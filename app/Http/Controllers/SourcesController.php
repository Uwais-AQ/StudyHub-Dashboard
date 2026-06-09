<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Resource;
use App\Http\Requests\StoreResourceRequest;
use App\Http\Requests\UpdateResourceRequest;

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
        $this->authorize('create', Resource::class);

        return view("sources_create");
    }

    /**
     * Menyimpan data baru ke database.
     */
    public function store(StoreResourceRequest $request)
    {
        $this->authorize('create', Resource::class);

        $validated = $request->validated();

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
        $resource = Resource::findOrFail($id);
        $this->authorize('update', $resource);

        return view("sources_edit", ['resource' => $resource]);
    }

    /**
     * Memperbarui data yang sudah ada.
     */
    public function update(UpdateResourceRequest $request, $id)
    {
        $resource = Resource::findOrFail($id);
        $this->authorize('update', $resource);

        $validated = $request->validated();

        $resource->update([
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
        $resource = Resource::findOrFail($id);
        $this->authorize('delete', $resource);

        $resource->delete();

        return redirect('/Sources')->with('success', 'Data berhasil dihapus!');
    }
}