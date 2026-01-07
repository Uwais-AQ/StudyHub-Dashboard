@extends("layouts/navigasi")
@section("container")

<style>
    .about-header { padding: 60px 0; background-color: #D9CFC7; border-radius: 20px; margin-bottom: 40px; }
    .card-mission { border: none; border-radius: 15px; transition: 0.3s; height: 100%; box-shadow: 0 4px 15px rgba(0,0,0,0.05); }
    .card-mission:hover { transform: translateY(-5px); }
    .icon-box { width: 50px; height: 50px; background: #0d6efd; color: white; border-radius: 12px; display: flex; align-items: center; justify-content: center; margin-bottom: 15px; }
    .section-title { border-left: 5px solid #0d6efd; padding-left: 15px; margin-bottom: 30px; font-weight: bold; }
    .warna { background-color: #C2A68C; }
</style>

<section class="section pb-5">
    <div class="about-header text-center shadow-sm">
        <h1 class="display-4 fw-bold text-dark">SNP</h1>
        <p class="lead text-muted">Smart Note Pelajar: Revolusi Cara Belajar Kamu</p>
    </div>

    <div class="container">
        <div class="row align-items-center mb-5">
            <div class="col-lg-6">
                <h2 class="section-title">Latar Belakang</h2>
                <p class="text-secondary" style="line-height: 1.8; text-align: justify;">
                    Di era informasi yang cepat ini, kemampuan mencatat dengan efisien adalah kunci keberhasilan. 
                    <strong>SNP</strong> hadir bukan sekadar aplikasi, tapi teman belajar yang membantu kamu mengubah materi kompleks 
                    menjadi aset visual yang rapi melalui metode <em>Cornell</em> dan <em>Mind Mapping</em>.
                </p>
            </div>
            <div class="col-lg-6 text-center">
                    <img src="img/Semangat Belajarnya~~.jpg" alt="Booster alami">
            </div>
        </div>

        <div class="row g-4 mb-5">
            <div class="col-md-6">
                <div class="card card-mission p-4">
                    <h3 class="fw-bold">Visi Kami</h3>
                    <ul class="list-unstyled text-secondary">
                        <li class="mb-2">✓ Rujukan utama efisiensi belajar digital di Indonesia.</li>
                        <li class="mb-2">✓ Menciptakan generasi pelajar strategis.</li>
                        <li class="mb-2">✓ Mengubah mencatat menjadi aktivitas menyenangkan.</li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card card-mission p-4">
                    <h3 class="fw-bold">Misi Kami</h3>
                    <ul class="list-unstyled text-secondary">
                        <li class="mb-2">✓ Menyediakan kurikulum pencatatan komprehensif.</li>
                        <li class="mb-2">✓ Mengembangkan template catatan yang otomatis rapi.</li>
                        <li class="mb-2">✓ Melatih kebiasaan belajar efektif untuk retensi memori.</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="text-center p-5 warna text-white rounded-4 shadow">
            <h2 class="mb-4">Tertarik berkolaborasi?</h2>
            <div class="d-flex justify-content-center gap-3">
                <a href="https://wa.me/6285269342299" class="btn btn-outline-light btn-lg px-4"><i class="bi bi-whatsapp me-2"></i>WhatsApp</a>
                <a href="#" class="btn btn-outline-light btn-lg px-4"><i class="bi bi-instagram me-2"></i>Instagram</a>
            </div>
        </div>
    </div>
</section>

@endsection