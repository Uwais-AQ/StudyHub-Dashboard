<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.rtl.min.css" integrity="sha384-CfCrinSRH2IR6a4e6fy2q6ioOX7O6Mtm1L9vRvFZ1trBncWmMePhzvafv7oIcWiW" crossorigin="anonymous">
    <title>@yield("title")</title>

    <style>
      body {
          background-color: #EFE9E3; /* Warna pilihanmu */
          color: #2D2D2D; /* Teks gelap agar kontras dengan background terang */
          min-height: 100vh;
          font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      }

      /* Penyesuaian Kartu untuk Background Terang */
      .custom-card {
          background-color: #ffffff; /* Kartu warna putih bersih */
          border: none; /* Hilangkan border kaku */
          color: #333;
          transition: transform 0.3s ease, box-shadow 0.3s ease;
          border-radius: 15px; /* Lebih bulat biar lebih modern */
          overflow: hidden;
          box-shadow: 0 4px 15px rgba(0,0,0,0.05); /* Shadow tipis & lembut */
      }

      .custom-card:hover {
          transform: translateY(-10px); /* Efek melayang ke atas */
          box-shadow: 0 12px 25px rgba(0,0,0,0.1); /* Shadow lebih tegas saat hover */
          z-index: 10;
      }

      /* Warna teks di dalam kartu */
      .card-title { 
          color: #1a1a1a; 
          font-weight: bold;
      }
      .card-text { 
          color: #555; 
      }

      /* Penyesuaian Navbar agar tidak terlalu kontras jika diinginkan */
      .navbar {
          box-shadow: 0 2px 10px rgba(0,0,0,0.1);
      }

      .info-box {
        background-color: #F9F8F6; /* Warna sedikit lebih terang dari background utama EFE9E3 */
        border: 2px solid #d3af37;  /* Garis solid dengan warna emas redup agar elegan */
        border-radius: 15px;       /* Sudut melengkung yang halus */
        padding: 20px;             /* Jarak teks ke garis (Padding) */
        margin: 20px 0;            /* Jarak kotak ke elemen luar (Margin) */
        box-shadow: 0 4px 6px rgba(0,0,0,0.02); /* Shadow sangat tipis agar terlihat menyatu */
      }
    </style>
  </head>


  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand font-weight-bold" href="/">Dashboard</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ url('/') }}">Home</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="featDrop" role="button" data-bs-toggle="dropdown">
                            Features
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark">
                            <li><a class="dropdown-item" href="{{ url('/Noteb') }}">Note bank</a></li>
                            <li><a class="dropdown-item" href="{{ url('/Sources') }}">My source</a></li>
                            <li><a class="dropdown-item" href="{{ url('/Blog') }}">Blog</a></li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="commDrop" role="button" data-bs-toggle="dropdown">
                            Community
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark">
                            <li><a class="dropdown-item" href="https://whatsapp.com/channel/0029Vb3t61TIyPtLB13FiC3Z">WhatsApp</a></li>
                            <li><a class="dropdown-item" href="#">Discord</a></li>
                            <li><a class="dropdown-item" href="#">Instagram</a></li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="javascript:void(0)" onclick="copyInvitation()">Invite a friend</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/About') }}">About us</a>
                    </li>
                </ul>

                <div class="d-flex align-items-center">
                    <a class="btn btn-outline-danger btn-sm px-3" href="{{ route('logout') }}"
                      onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                      <span class="me-1">Logout</span> 
                      <small>⏻</small> </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <div id="copy-toast" style="display: none; position: fixed; top: 20px; right: 20px; background: #28a745; color: white; padding: 15px 25px; border-radius: 8px; z-index: 9999; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
        Undangan telah tersalin ke clipboard. Bagikan ke teman mu!
    </div>

    @yield("container")

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

    <script>
      function copyInvitation() {
            const textToCopy = 
            `Halo teman-teman! 👋

            Pernah nggak sih ngerasa pusing lihat catatan kuliah/sekolah yang berantakan? Materi numpuk, tapi pas mau belajar ulang malah bingung sendiri karena catatannya nggak rapi. 😵‍💫

            Tenang, sekarang ada Smart Note Pelajar! Platform kece yang bakal nemenin kamu belajar teknik mencatat mutakhir, mulai dari metode Cornell sampai Mind Mapping. Kami sediain kurikulum lengkap dan template siap pakai yang bikin catatanmu otomatis rapi dan estetik. ✍️✨

            Dengan teknik yang tepat, kamu bisa hemat waktu belajar, makin paham materi, dan punya aset belajar yang enak dilihat buat persiapan ujian! 🚀

            "Catat Lebih Cerdas, Belajar Lebih Berkelas."

            Yuk, langsung cek dan join di sini:
            👉 https://youtu.be/L3tsYC5OYhQ?si=Pep1_jQoXQtkUp-T`;

            navigator.clipboard.writeText(textToCopy).then(() => {
                const toast = document.getElementById('copy-toast');
                toast.style.display = 'block';

                setTimeout(() => {
                    toast.style.display = 'none';
                }, 2000);
            }).catch(err => {
                console.error('Gagal menyalin teks: ', err);
            });
        }
    </script> 
  </body>
</html>