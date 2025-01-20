@php
    $container = 'container-fluid';
    $containerNav = 'container-fluid';
    $isNavbar = false;
@endphp

@extends('layouts/contentNavbarLayout')

@section('page-script')
    @vite('resources/assets/js/filter-layanan.js')
@endsection

@section('title', 'Filter Layanan')

@section('content')
    <div class="container-fluid">
        <x-judul title="Filter Layanan" />
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-style1">
                <li class="breadcrumb-item">
                    <a href="{{ url('/') }}">Dashboard</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('layanan-list') }}">Layanan</a>
                </li>
                <li class="breadcrumb-item active">Filter Layanan</li>
            </ol>
        </nav>
        <!--/ Breadcrumb -->

        <!-- Filter Form -->
        <div class="card">
            <div class="card-body">
                <form action="{{ route('layanan-list') }}" method="GET">
                    <!-- Search Bar -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="bx bx-search"></i>
                                </span>
                                <input type="text" name="search" class="form-control" placeholder="Search layanan">
                            </div>
                        </div>
                        <div class="col-md-6 d-flex justify-content-end align-items-center">
                            <button type="submit" class="btn btn-primary me-2">
                                <i class="bx bx-plus"></i>
                            </button>
                            <div class="dropdown me-2">
                                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Kategori
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <li><a class="dropdown-item" href="#">Layanan</a></li>
                                    <li><a class="dropdown-item" href="#">Pakaian</a></li>
                                </ul>
                            </div>
                            <a href="{{ route('layanan-list') }}" class="btn btn-danger">
                                <i class="bx bx-x"></i>
                            </a>
                        </div>
                    </div>

                    <!-- Filter Pencucian -->
                    <h5 class="mb-3">Pencucian</h5>
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <div class="list-group">
                                <label class="list-group-item">
                                    <input class="form-check-input" type="checkbox" name="pencucian[]" value="cuci-kering"
                                        id="cuciKering">
                                    Cuci Kering
                                </label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="list-group">
                                <label class="list-group-item">
                                    <input class="form-check-input" type="checkbox" name="pencucian[]" value="kiloan"
                                        id="kiloan">
                                    Kiloan
                                </label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="list-group">
                                <label class="list-group-item">
                                    <input class="form-check-input" type="checkbox" name="pencucian[]" value="cuci-kering"
                                        id="cuciKering">
                                    Lorem
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                      <div class="col-md-4">
                          <div class="list-group">
                              <label class="list-group-item">
                                  <input class="form-check-input" type="checkbox" name="pencucian[]" value="cuci-kering"
                                      id="cuciKering">
                                  Setrika
                              </label>
                          </div>
                      </div>
                      <div class="col-md-4">
                          <div class="list-group">
                              <label class="list-group-item">
                                  <input class="form-check-input" type="checkbox" name="pencucian[]" value="kiloan"
                                      id="kiloan">
                                  Satuan
                              </label>
                          </div>
                      </div>
                      <div class="col-md-4">
                          <div class="list-group">
                              <label class="list-group-item">
                                  <input class="form-check-input" type="checkbox" name="pencucian[]" value="cuci-kering"
                                      id="cuciKering">
                                  Lorem
                              </label>
                          </div>
                      </div>
                  </div>
                    <hr>

                    <!-- Filter Waktu -->
                    <h5 class="mb-3">Waktu</h5>
                    <div class="row mb-3">
                      <div class="col-md-4">
                        <div class="list-group">
                            <label class="list-group-item">
                                <input class="form-check-input" type="checkbox" name="pencucian[]" value="regular"
                                    id="cuciKering">
                                Regular
                            </label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="list-group">
                            <label class="list-group-item">
                                <input class="form-check-input" type="checkbox" name="pencucian[]" value="express"
                                    id="kiloan">
                                Express
                            </label>
                        </div>
                    </div>
                    </div>
                    <hr>

                    <!-- Radio Buttons -->
                    <h5 class="mb-3">Urutan</h5>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="sort" value="terbaru" id="terbaru">
                        <label class="form-check-label" for="terbaru">Terbaru</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="sort" value="terlama" id="terlama">
                        <label class="form-check-label" for="terlama">Terlama</label>
                    </div>
                    <hr>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="sort" value="termahal" id="termahal">
                        <label class="form-check-label" for="termahal">Termahal</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="sort" value="termurah" id="termurah">
                        <label class="form-check-label" for="termurah">Termurah</label>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
