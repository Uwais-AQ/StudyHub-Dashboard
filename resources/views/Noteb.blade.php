@extends("layouts/navigasi")
@section("container")

        <section class="section">
          <div class="section-header me-7">
            <h1 class="text-center">Note Bank</h1>
            <hr>
          </div>

            <div class="section-body me-4">
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"/>
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
                {{-- tanyakan gimana caranya biar kecil di kanan, bukan full lenght --}}
                <br>
                <br>
                <div class="container mt-4">
                    <div class="row g-4"> <div class="col-md-3">
                            <div class="card h-100 custom-card">
                                <img src="img/CardC.webp" class="card-img-top" alt="Thumbnail">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">Some quick example text to build on the card title.</p>
                                    <a href="#" class="btn btn-primary">Go somewhere</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="card h-100 custom-card">
                                <img src="img/CardC.webp" class="card-img-top" alt="Thumbnail">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">Some quick example text to build on the card title.</p>
                                    <a href="#" class="btn btn-primary">Go somewhere</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="card h-100 custom-card">
                                <img src="img/CardC.webp" class="card-img-top" alt="Thumbnail">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">Some quick example text to build on the card title.</p>
                                    <a href="#" class="btn btn-primary">Go somewhere</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="card h-100 custom-card">
                                <img src="img/CardC.webp" class="card-img-top" alt="Thumbnail">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">Some quick example text to build on the card title.</p>
                                    <a href="#" class="btn btn-primary">Go somewhere</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

           
            </div>
          </div>
        </section>

@endsection