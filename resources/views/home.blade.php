@extends("layouts/navigasi")
@section("container")

<style>
    /* Styling Dashboard Profesional */
    .dashboard-card { border: none; border-radius: 15px; background: #fff; transition: 0.3s; height: 100%; box-shadow: 0 4px 12px rgba(0,0,0,0.05); }
    .dashboard-card:hover { transform: translateY(-5px); box-shadow: 0 8px 20px rgba(0,0,0,0.1); }
    
    /* Pomodoro Styling */
    .timer-display { font-size: 5rem; font-weight: 800; color: #212529; font-family: 'Courier New', Courier, monospace; }
    .quote-section { background-color: #f8f9fa; border-left: 5px solid #212529; padding: 20px; border-radius: 10px; font-style: italic; color: #495057; }
    
    /* Utility */
    .section-title { font-weight: 700; letter-spacing: -0.5px; }
    .list-group-item { transition: 0.2s; }
    .list-group-item:hover { background-color: #f8f9fa; }
</style>

<section class="section pb-5">
    <div class="container text-center mb-5 mt-4">
        <h1 class="display-4 fw-bold mb-2">Dashboard</h1>
        <p class="text-muted fs-5">Selamat datang kembali, Tuan. Siap untuk belajar hari ini?</p>
        
        <div class="row justify-content-center mt-4">
            <div class="col-md-9">
                <div class="quote-section mx-auto shadow-sm">
                    "Setiap manusia diciptakan dengan potensi terbaik dalam dirinya, dan sebuah kezoliman terburuk mengubur talenta dalam tubuh yang malas."
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row g-4">
            <div class="col-12 mb-2">
                <div class="card dashboard-card p-4 text-center border-top border-primary border-4">
                    <h4 class="fw-bold mb-1"><i class="bi bi-cpu me-2"></i>Focus Mode</h4>
                    <p class="text-muted small mb-4">Gunakan teknik Pomodoro untuk efisiensi maksimal</p>
                    
                    <div class="timer-display mb-3" id="timer-display">25:00</div>
                    
                    <div class="d-flex justify-content-center gap-3 mb-4">
                        <button class="btn btn-dark btn-lg px-5 rounded-pill shadow" id="start-btn">Start</button>
                        <button class="btn btn-warning btn-lg px-5 rounded-pill shadow d-none" id="pause-btn">Pause</button>
                        <button class="btn btn-outline-danger btn-lg px-4 rounded-pill" id="reset-btn">Reset</button>
                    </div>

                    <div class="d-flex justify-content-center gap-2">
                        <button class="btn btn-sm btn-outline-secondary" onclick="setTimer(25)">Focus (25m)</button>
                        <button class="btn btn-sm btn-outline-secondary" onclick="setTimer(5)">Short Break (5m)</button>
                        <button class="btn btn-sm btn-outline-secondary" onclick="setTimer(15)">Long Break (15m)</button>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card dashboard-card p-4">
                    <div class="d-flex justify-content-between align-items-center mb-4 border-bottom pb-2">
                        <h4 class="section-title m-0">Currently</h4>
                        <a href="{{ route('status.edit') }}" class="btn btn-dark btn-sm rounded-pill px-3 shadow-sm">
                            <i class="bi bi-pencil-square me-1"></i> Update Status
                        </a>                    
                    </div>
                    
                    <div class="list-group list-group-flush">
                        <div class="list-group-item border-0 px-0 d-flex align-items-center">
                            <i class="bi bi-book me-3 text-primary fs-5"></i>
                            <div>
                                <strong class="d-block text-uppercase small text-muted" style="letter-spacing: 1px;">Reading</strong>
                                <span class="text-dark fw-medium">{{ $currentStatus->reading ?? '-' }}</span>
                            </div>
                        </div>

                        <div class="list-group-item border-0 px-0 d-flex align-items-center">
                            <i class="bi bi-mortarboard me-3 text-danger fs-5"></i>
                            <div>
                                <strong class="d-block text-uppercase small text-muted" style="letter-spacing: 1px;">Studying</strong>
                                <span class="text-dark fw-medium">{{ $currentStatus->studying ?? '-' }}</span>
                            </div>
                        </div>

                        <div class="list-group-item border-0 px-0 d-flex align-items-center">
                            <i class="bi bi-play-circle me-3 text-warning fs-5"></i>
                            <div>
                                <strong class="d-block text-uppercase small text-muted" style="letter-spacing: 1px;">Watching</strong>
                                <span class="text-dark fw-medium">{{ $currentStatus->watching ?? '-' }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card dashboard-card p-4">
                    <div class="d-flex justify-content-between align-items-center mb-4 border-bottom pb-2">
                        <h4 class="section-title m-0">Recent Notes</h4>
                        <a href="/Noteb" class="btn btn-sm btn-link text-decoration-none text-dark fw-bold p-0">View Bank</a>
                    </div>
                    
                    <div class="list-group list-group-flush">
                        <a href="#" class="list-group-item list-group-item-action border-0 px-0 d-flex justify-content-between align-items-center">
                            <span><i class="bi bi-file-earmark-text me-2"></i>Biologi</span>
                            <small class="text-muted">Today</small>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action border-0 px-0 d-flex justify-content-between align-items-center">
                            <span><i class="bi bi-file-earmark-text me-2"></i>Laravel 12</span>
                            <small class="text-muted">Yesterday</small>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action border-0 px-0 d-flex justify-content-between align-items-center">
                            <span><i class="bi bi-file-earmark-text me-2"></i>Daftar Belanja</span>
                            <small class="text-muted">22 Dec</small>
                        </a>
                    </div>

                    <div class="mt-4 pt-2">
                        <button class="btn btn-primary w-100 rounded-pill shadow-sm py-2 fw-bold">
                            <i class="bi bi-plus-lg me-2"></i>Buat Catatan Baru
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    let timer;
    let timeLeft = 25 * 60; 
    let isRunning = false;

    const display = document.getElementById('timer-display');
    const startBtn = document.getElementById('start-btn');
    const pauseBtn = document.getElementById('pause-btn');

    function updateDisplay() {
        let minutes = Math.floor(timeLeft / 60);
        let seconds = timeLeft % 60;
        display.innerText = `${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;
        document.title = isRunning ? `(${display.innerText}) Focus!` : "SNP - Dashboard";
    }

    function startTimer() {
        if (isRunning) return;
        isRunning = true;
        startBtn.classList.add('d-none');
        pauseBtn.classList.remove('d-none');

        timer = setInterval(() => {
            if (timeLeft > 0) {
                timeLeft--;
                updateDisplay();
            } else {
                clearInterval(timer);
                alert("Waktu fokus habis! Istirahatlah sejenak.");
                resetTimer();
            }
        }, 1000);
    }

    function pauseTimer() {
        clearInterval(timer);
        isRunning = false;
        startBtn.classList.remove('d-none');
        pauseBtn.classList.add('d-none');
    }

    function resetTimer() {
        pauseTimer();
        timeLeft = 25 * 60;
        updateDisplay();
    }

    function setTimer(minutes) {
        pauseTimer();
        timeLeft = minutes * 60;
        updateDisplay();
    }

    startBtn.addEventListener('click', startTimer);
    pauseBtn.addEventListener('click', pauseTimer);
    document.getElementById('reset-btn').addEventListener('click', resetTimer);
</script>

@endsection
