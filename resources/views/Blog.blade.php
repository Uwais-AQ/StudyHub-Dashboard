@extends("layouts/navigasi")
@section("container")

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

<style>
    body { background-color: #f8f6f1; color: #212529; font-family: 'Inter', sans-serif; }
    
    /* Carousel (Sudah Bagus - Jangan Diubah) */
    .carousel-wrapper { padding: 40px 0; }
    .swiper { width: 100%; padding: 20px 10px 50px 10px !important; }
    .blog-card-crl { background: white; border-radius: 12px; overflow: hidden; border: none; box-shadow: 0 2px 12px rgba(0,0,0,0.04); }
    .crl-img { width: 100%; height: 160px; object-fit: cover; }
    .author-info { display: flex; align-items: center; gap: 8px; margin-top: 15px; }
    .author-avatar { width: 18px; height: 18px; background: #dee2e6; border-radius: 50%; }
    .author-name { font-size: 0.75rem; color: #868e96; }

    /* --- PERBAIKAN MAIN CONTENT --- */

    /* 1. Sorting Bar (Kotak Sortir) */
    .filter-bar {
        background: #ffffff;
        padding: 15px 25px;
        border-radius: 12px;
        margin-bottom: 30px; /* Jarak ke Our Blog & ke List Artikel */
        box-shadow: 0 2px 8px rgba(0,0,0,0.04);
        border: 1px solid #f0f0f0;
    }

    /* 2. Sidebar Alignment (Sejajar Garis Hijau) */
    .sidebar-adjustment {
        margin-top: 72px; /* Menyesuaikan tinggi header "Our Blog" agar sejajar artikel 1 */
    }

    .sticky-sidebar { position: sticky; top: 20px; }

    /* 3. Independent Scroll */
    .main-content-scroll { 
        max-height: 120vh; /* Sedikit lebih panjang agar pagination terlihat */
        overflow-y: auto; 
        padding-right: 20px; 
    }
    .main-content-scroll::-webkit-scrollbar { width: 4px; }
    .main-content-scroll::-webkit-scrollbar-thumb { background: #e0e0e0; border-radius: 10px; }

    .magazine-card { transition: transform 0.2s; }
    .magazine-card:hover { transform: translateX(5px); }
</style>

<div class="container py-4">
    
    <div class="carousel-wrapper text-center">
        <h3 class="fw-bold mb-1">Featured Guidance</h3>
        <p class="text-muted small mb-4">Pilih panduan belajar terbaik</p>
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                @for ($i = 1; $i <= 6; $i++)
                <div class="swiper-slide text-start">
                    <div class="card blog-card-crl">
                        <img src="img/blog 250x250 px.jpg" class="crl-img">
                        <div class="card-body p-3">
                            <h6 class="fw-bold" style="font-size: 0.9rem;">Cara Memulai Perjalanan Belajar di NSP</h6>
                            <div class="author-info">
                                <div class="author-avatar"></div>
                                <span class="author-name">Admin NSP</span>
                            </div>
                        </div>
                    </div>
                </div>
                @endfor
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8 main-content-scroll">
            <h2 class="fw-bold mb-4">Our Blog</h2>

            <div class="filter-bar d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                    <span class="text-muted small fw-bold me-3">SORT BY</span>
                    <select class="form-select form-select-sm border-0 bg-light w-auto">
                        <option>Terbaru</option>
                        <option>Terlama</option>
                        <option>Terpopuler</option>
                    </select>
                </div>
                <div class="text-muted small">7 Articles</div>
            </div>

            <div class="row g-4">
                @for ($i = 0; $i < 5; $i++)
                <div class="col-12">
                    <div class="card magazine-card border-0 shadow-sm rounded-4 overflow-hidden">
                        <div class="row g-0 align-items-center">
                            <div class="col-md-4">
                                <img src="img/blog 250x250 px.jpg" class="img-fluid h-100 object-fit-cover">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body p-4">
                                    <span class="text-secondary small fw-bold text-uppercase">Study Tips</span>
                                    <h5 class="fw-bold mt-1">Strategi Mencatat Efektif Era Digital</h5>
                                    <p class="text-muted small">Maksimalkan retensi memori dengan visual mapping...</p>
                                    <div class="d-flex justify-content-between align-items-center mt-3">
                                        <small class="text-muted">5 Min Read</small>
                                        <a href="#" class="text-dark fw-bold small text-decoration-none border-bottom border-2 border-dark">READ MORE</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endfor
            </div>

            <nav class="my-5">
                <ul class="pagination justify-content-center">
                    <li class="page-item"><a class="page-link border-0 shadow-sm rounded-circle mx-1 text-dark" href="#">1</a></li>
                    <li class="page-item active"><a class="page-link border-0 shadow-sm rounded-circle mx-1 bg-dark border-dark" href="#">2</a></li>
                    <li class="page-item"><a class="page-link border-0 shadow-sm rounded-circle mx-1 text-dark" href="#">3</a></li>
                </ul>
            </nav>
        </div>

        <div class="col-lg-4 d-none d-lg-block">
            <div class="sidebar-adjustment">
                <div class="sticky-sidebar">
                    <div class="card border-0 shadow-sm rounded-4 mb-4 p-4 bg-white text-center">
                        <h6 class="fw-bold mb-3">Search Article</h6>
                        <div class="input-group border rounded-pill overflow-hidden bg-light">
                            <input type="text" class="form-control border-0 bg-transparent ps-3" placeholder="Keyword...">
                            <button class="btn btn-transparent border-0 pe-3">🔍</button>
                        </div>
                    </div>

                    <div class="card border-0 shadow-sm rounded-4 p-4 bg-white">
                        <h6 class="fw-bold mb-3">Topics</h6>
                        <div class="d-flex flex-wrap gap-2">
                            @foreach(['Tips', 'Logic', 'Design', 'Code'] as $tag)
                            <a href="#" class="btn btn-sm btn-light border-0 rounded-pill px-3" style="font-size: 0.8rem;">#{{ $tag }}</a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
    new Swiper(".mySwiper", {
        slidesPerView: 1,
        spaceBetween: 20,
        loop: true,
        navigation: { nextEl: ".swiper-button-next", prevEl: ".swiper-button-prev" },
        breakpoints: { 768: { slidesPerView: 2 }, 1024: { slidesPerView: 3 } }
    });
</script>

@endsection