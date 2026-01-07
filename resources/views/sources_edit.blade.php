@extends('layouts.navigasi')
@section('container')
<div class="container mt-5">
    <div class="card shadow-sm border-0 p-4" style="border-radius: 15px;">
        <h3 class="fw-bold mb-4">✏️ Edit Sumber: {{ $resource->nama }}</h3>
        <hr>

        <form action="/Sources/update/{{ $resource->id }}" method="POST">
            @csrf
            @method('PUT') <div class="mb-3">
                <label class="form-label fw-bold">Nama Sumber</label>
                <input type="text" name="nama" class="form-control" value="{{ $resource->nama }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Deskripsi</label>
                <textarea name="deskripsi" class="form-control" rows="3" required>{{ $resource->deskripsi }}</textarea>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Link (Sumber)</label>
                <input type="text" name="sumber" class="form-control" value="{{ $resource->sumber }}" required>
            </div>

            <div class="mt-4">
                <button type="submit" class="btn btn-dark px-4">Simpan Perubahan</button>
                <a href="/Sources" class="btn btn-outline-secondary px-4">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection