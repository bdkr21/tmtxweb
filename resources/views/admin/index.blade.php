@extends('layouts.admin.head')

  <body>
    <div id="app">
      @include('layouts.admin.side_bar')
      </div>
      <div id="main">
        <header class="mb-3">
          <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
          </a>
        </header>

        <div class="page-heading">
          <h3>Statistics</h3>
        </div>
        <div class="page-content">
            <div class="col-12 col-lg-9">
                <div class="row">
                  <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                      <div class="card-body px-4 py-4-5">
                        <div class="row">
                          <div
                            class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start"
                          >
                            <div class="stats-icon purple mb-2">
                              <i class="iconly-boldProfile"></i>
                            </div>
                          </div>
                          <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                            <h6 class="text-muted font-semibold">
                              Pemohon
                            </h6>
                            <a href="{{ route('admin.dataPemohon') }}" class="font-extrabold mb-0 stretched-link">{{ $jumlahData }}</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
          {{-- <section class="row">
            <div class="col-12 col-lg-9">
              <div class="row">
                <div class="col-6 col-lg-3 col-md-6">
                  <div class="card">
                    <div class="card-body px-4 py-4-5">
                      <div class="row">
                        <div
                          class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                          <div class="stats-icon blue mb-2">
                            <i class="iconly-boldProfile"></i>
                          </div>
                        </div>
                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                          <h6 class="text-muted font-semibold">Data Pemohon</h6>
                          <a href="{{ route('admin.dataPemohon') }}" class="font-extrabold mb-0 stretched-link">{{ $jumlahData }}</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section> --}}
        </div>

        @include('layouts.footer')
      </div>
    </div>
  </body>
    @include('layouts.admin.script')
</html>
