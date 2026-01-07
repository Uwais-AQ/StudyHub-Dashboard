@extends('layouts.navigasi') 
@section('container')
<div class="container mt-5 pb-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            
            <div class="card shadow-sm border-0" style="border-radius: 15px;">
                <div class="card-body p-5">
                    <h3 class="fw-bold mb-4">📝 Tambah Sumber Belajar</h3>
                    <hr class="mb-4">

                    <form action="/Sources/store" method="POST">
                        @csrf
                        
                        <div class="mb-4">
                            <label for="nama" class="form-label fw-semibold">Nama</label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" 
                                   id="nama" name="nama" placeholder="Contoh: WPU, Laracasts, dll" value="{{ old('nama') }}">
                            @error('nama')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="deskripsi" class="form-label fw-semibold">Deskripsi</label>
                            <textarea class="form-control @error('deskripsi') is-invalid @enderror" 
                                      id="deskripsi" name="deskripsi" rows="4" 
                                      placeholder="Deskripsi sumber belajarmu.">{{ old('deskripsi') }}</textarea>
                            @error('deskripsi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="sumber" class="form-label fw-semibold">Link to Page</label>
                            <input type="text" class="form-control @error('sumber') is-invalid @enderror" 
                                   id="sumber" name="sumber" placeholder="Masukkan link sumber belajarmu." value="{{ old('sumber') }}">
                            @error('sumber')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-between align-items-center mt-5">
                            <a href="/Sources" class="text-decoration-none text-muted">Batal</a>
                            <button type="submit" class="btn btn-dark px-5 py-2" style="border-radius: 8px;">Simpan Sumber</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    body {
        background-color: #EFE9E3; /* Warna krem estetik */
    }
    .form-control {
        background-color: #f8f9fa;
        border: 1px solid #e9ecef;
        padding: 12px;
        border-radius: 8px;
    }
    .form-control:focus {
        background-color: #fff;
        border-color: #adb5bd;
        box-shadow: none;
    }
</style>
@endsection