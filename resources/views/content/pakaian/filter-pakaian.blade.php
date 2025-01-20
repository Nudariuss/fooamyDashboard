@php
$container = 'container-fluid';
$containerNav = 'container-fluid';
$isNavbar = false;
@endphp

@extends('layouts/contentNavbarLayout')

@section('page-script')
@vite('resources/assets/js/filter-pakaian.js')
@endsection

@section('title', 'Filter Pakaian')

@section('content')
<div class="container-fluid">
    <x-judul title="Filter Pakaian" />
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-style1">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('list-pakaian') }}">Pakaian</a></li>
            <li class="breadcrumb-item active">Filter</li>
        </ol>
    </nav>

    <!-- Filter Card -->
    <div class="card">
        <div class="card-body">
            <!-- Search Bar -->
            <div class="row mb-4">
                <div class="col-md-6">
                    <form class="d-flex align-items-center">
                        <div class="input-group">
                            <span class="input-group-text"><i class="bx bx-search"></i></span>
                            <input type="text" class="form-control" placeholder="Search Pakaian">
                        </div>
                    </form>
                </div>
                <!-- Filter Buttons -->
                <div class="col-md-6 d-flex justify-content-end">
                  <a href="{{ route('list-pakaian') }}" class="btn btn-primary me-2">Apply</a>
                  <a href="{{ route('list-pakaian') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </div>

            <h5>Top</h5>
            <div class="row mb-4">
                <div class="col-md-3">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="kemeja">
                        <label class="form-check-label" for="kemeja">Kaos</label>
                    </div>
                </div>
                <div class="col-md-3">
                  <div class="form-check">
                      <input type="checkbox" class="form-check-input" id="kemeja">
                      <label class="form-check-label" for="kemeja">Kemeja</label>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-check">
                      <input type="checkbox" class="form-check-input" id="kemeja">
                      <label class="form-check-label" for="kemeja">Lorem</label>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-check">
                      <input type="checkbox" class="form-check-input" id="kemeja">
                      <label class="form-check-label" for="kemeja">Lorem</label>
                  </div>
                </div>
            </div>
            <hr>

            <h5>Waktu</h5>
            <div class="row mb-4">
                <div class="col-md-3">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="reguler">
                        <label class="form-check-label" for="reguler">Reguler</label>
                    </div>
                </div>
                <div class="col-md-3">
                  <div class="form-check">
                      <input type="checkbox" class="form-check-input" id="reguler">
                      <label class="form-check-label" for="reguler">Express</label>
                  </div>
              </div>
              <div class="col-md-3">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="reguler">
                    <label class="form-check-label" for="reguler">Lorem</label>
                </div>
              </div>
            </div>
            <hr>

            <h5>Lorem</h5>
            <div class="row mb-4">
                <div class="col-md-3">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="reguler">
                        <label class="form-check-label" for="reguler">Lorem</label>
                    </div>
                </div>
                <div class="col-md-3">
                  <div class="form-check">
                      <input type="checkbox" class="form-check-input" id="reguler">
                      <label class="form-check-label" for="reguler">Lorem</label>
                  </div>
              </div>
              <div class="col-md-3">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="reguler">
                    <label class="form-check-label" for="reguler">Lorem</label>
                </div>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-md-3 mb-3">
                  <div class="form-check">
                      <input type="checkbox" class="form-check-input" id="satuan" name="satuan">
                      <label for="satuan" class="form-check-label">Terbaru</label>
                  </div>
              </div>
              <div class="col-md-3 mb-3">
                  <div class="form-check">
                      <input type="checkbox" class="form-check-input" id="kilogram" name="kilogram">
                      <label for="kilogram" class="form-check-label">Terlama</label>
                  </div>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-md-3 mb-3">
                  <div class="form-check">
                      <input type="checkbox" class="form-check-input" id="satuan" name="satuan">
                      <label for="satuan" class="form-check-label">Termahal</label>
                  </div>
              </div>
              <div class="col-md-3 mb-3">
                  <div class="form-check">
                      <input type="checkbox" class="form-check-input" id="kilogram" name="kilogram">
                      <label for="kilogram" class="form-check-label">Termurah</label>
                  </div>
              </div>
            </div>
        </div>
    </div>
</div>
@endsection
