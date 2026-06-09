@extends("layouts/navigasi")
@section("container")
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<section class="section">
    <div class="section-header me-7">
        <h1 class="text-center">My Source 
            <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#multiCollapseExample2" aria-expanded="false" aria-controls="multiCollapseExample2">?</button>
        </h1>
    </div>

    <div class="section-body me-4">
        <div class="col">
            <div class="collapse multi-collapse" id="multiCollapseExample2">
                <div class="card card-body">
                    <h2>Perpustakaan sumber belajar mu</h2>
                    <p>Internet adalah tempat yang luas dan penuh harta karun. Dan di antaranya juga terdapat banyak sumber berharga yang bisa bermanfaat nge-boost cara belajar kamu jadi <b>10x lipat</b>. Namun sayang nya harta karun ini tersebar dan tercecar. Membuka halaman web satu persatu akan menghilangkan waktu berhargamu. Maka dari itu pada laman ini, kamu akan menyimpan semua sumber belajarmu dalam 1 tempat. Mengorganisirnya dengan rapi dan cantik, agar kamu bisa fokus pada 1 hal utama. <b>belajar</b>.</p>
                </div>
            </div>
        </div>

        <hr>

        <div class="d-flex justify-content-between mb-3 ms-auto">
            
            
            <form class="d-flex w-25" role="search">
                <input class="form-control me-2" type="search" placeholder="Cari sumber..." aria-label="Search"/>
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>

        <div class="container bg-white p-3 shadow-sm" style="border-radius: 10px;">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="fw-bold m-0">Daftar Sumber</h5>
                <div>
                    <span class="text-muted small me-2">Urutkan Nama:</span>
                    <div class="btn-group" role="group">
                        <a href="/Sources?sort=asc" class="btn btn-sm {{ $currentSort == 'asc' ? 'btn-dark' : 'btn-outline-dark' }}">asc</a>
                        <a href="/Sources?sort=desc" class="btn btn-sm {{ $currentSort == 'desc' ? 'btn-dark' : 'btn-outline-dark' }}">desc</a>
                    </div>
                </div>
            </div>
            
            <table class="table align-middle">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col" style="width: 45%;">Deskripsi</th>
                        <th scope="col">Link to Page</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($resources as $src)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td class="fw-bold">{{ $src->nama }}</td>
                        <td>{{ $src->deskripsi }}</td>
                        <td>
                            <a href="{{ Str::startsWith($src->sumber, 'http') ? $src->sumber : 'https://' . $src->sumber }}" 
                            target="_blank" class="badge text-bg-success text-decoration-none">Kunjungi</a>
                        </td>
                        <td>
                            @can('update', $src)
                                <a href="/Sources/edit/{{ $src->id }}" class="badge text-bg-warning text-decoration-none">Update</a>
                            @endcan
                            @can('delete', $src)
                                <form action="{{ route('sources.destroy', $src->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="badge text-bg-danger text-decoration-none">Hapus</button>
                                </form>
                            @endcan
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <a href="/Sources/create" class="btn btn-secondary btn-sm">➕ Tambah Sumber</a>
        </div>
    </div>
</section>

@endsection