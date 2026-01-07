<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\resource; 

class SourcesController extends Controller
{
    /**
     */
    public function Sources(Request $request) 
    {
        $sortOrder = $request->get('sort', 'asc');

        // Filter: Hanya ambil data yang user_id-nya sesuai 
        $sources = resource::where('user_id', auth()->id())
                           ->orderBy('nama', $sortOrder)
                           ->get();

        return view("sources", [
            'resources' => $sources, 
            'currentSort' => $sortOrder
        ]);
    }

    /**
     * FUNGSI YANG TADI HILANG: Menampilkan halaman form tambah data.
     */
    public function create()
    {
        return view("sources_create"); 
    }

    /**
     * B - Build: Menyimpan data baru ke database[cite: 52].
     */
    public function store(Request $request)
    {
        // 1. Validasi input agar database tetap bersih[cite: 50].
        $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'sumber' => 'required'
        ]);

        // 2. Simpan dengan menyertakan user_id (Data Association)[cite: 107].
        resource::create([
            'user_id'   => auth()->id(),
            'nama'      => $request->nama,
            'deskripsi' => $request->deskripsi,
            'sumber'    => $request->sumber,
        ]);

        return redirect('/Sources')->with('success', 'Sumber berhasil ditambahkan!');
    }

    public function edit($id)
    {
        // Pastikan user tidak bisa mengedit data orang lain lewat ID di URL[cite: 112, 117].
        $resource = resource::where('id', $id)
                            ->where('user_id', auth()->id())
                            ->firstOrFail();
                            
        return view("sources_edit", ['resource' => $resource]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'sumber' => 'required'
        ]);

        $item = resource::where('id', $id)
                        ->where('user_id', auth()->id())
                        ->firstOrFail();

        $item->update([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'sumber' => $request->sumber,
        ]);

        return redirect('/Sources')->with('success', 'Data berhasil diupdate!');
    }

    /**
     * D - Debug: Menangani penghapusan data secara aman[cite: 55].
     */
    public function destroy($id)
    {
        $item = resource::where('id', $id)
                        ->where('user_id', auth()->id())
                        ->firstOrFail();
        $item->delete();

        return redirect('/Sources')->with('success', 'Data berhasil dihapus!');
    }
}