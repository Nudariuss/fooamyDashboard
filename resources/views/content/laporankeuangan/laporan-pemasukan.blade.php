@php
    $container = 'container-fluid';
    $containerNav = 'container-fluid';
    $isNavbar = false;
@endphp

@extends('layouts/contentNavbarLayout')

@section('page-script')
    @vite('resources/assets/js/bottombar.js')
@endsection

@section('page-script')
    @vite('resources/assets/js/laporan-pemasukan.js')
@endsection

@section('title', 'Laporan Keuangan - Pemasukan')

@section('content')
    <div class="content">
      <div class="container-fluid">
        <x-judul title="Laporan Keuangan Pemasukan" />
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-style1">
                <li class="breadcrumb-item">
                    <a href="{{ url('/') }}">Dashboard</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="javascript:void(0);">Laporan Keuangan</a>
                </li>
                <li class="breadcrumb-item active">
                    <a href="{{ route('laporan-keuangan-pemasukan') }}">Pemasukan</a>
                </li>
            </ol>
        </nav>

        <!-- Summary Cards -->
        <div class="row mb-4">
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-body">
                        <h5>DAY</h5>
                        <h2>Rp 5,345,000</h2>
                        <p>5k orders</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-body">
                        <h5>WEEK</h5>
                        <h2>Rp 67,435,000</h2>
                        <p>21k orders</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-body">
                        <h5>MONTH</h5>
                        <h2>Rp 142,350,000</h2>
                        <p>6k orders</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Table Section -->
        <div class="card mb-3">
            <div class="card-header">
                <div class="row">
                    <!-- Search Bar -->
                    <div class="col-md-6">
                        <div class="input-group input-group-merge short-searchbar">
                            <span class="input-group-text" id="basic-addon-search"><i class="bx bx-search"></i></span>
                            <input type="text" class="form-control" placeholder="Cari Pemasukan"
                                aria-label="Cari Pemasukan" aria-describedby="basic-addon-search31" />
                        </div>
                    </div>
                    <div class="col-md-6 d-flex justify-content-end align-items-center gap-2">
                        <!-- View Log Button -->
                        <a href="javascript:void(0);" class="btn btn-primary">
                            View Log
                        </a>

                        <!-- Clear Button -->
                        <button type="button" class="btn btn-secondary" id="clearFilters">
                            Clear
                        </button>

                        <!-- Dropdown Pemasukan/Pengeluaran -->
                        {{-- <div class="btn-group">
                            <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Pemasukan
                            </button>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item active"
                                        href="{{ route('laporan-keuangan-pemasukan') }}">Pemasukan</a>
                                </li>
                                <li>
                                    <a class="dropdown-item"
                                        href="{{ route('laporan-keuangan-pengeluaran') }}">Pengeluaran</a>
                                </li>
                            </ul>
                        </div> --}}

                        <!-- Filter Button -->
                        <a href="{{ route('laporan-filter', ['type' => 'pemasukan']) }}" class="btn btn-primary">
                            <i class="bx bx-filter"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Table -->
            <div class="card-datatable table-responsive text-nowrap">
                <table class="table table-striped border-bottom">
                    <thead class="bg-primary">
                        <tr>
                            <th><input type="checkbox" id="selectAll" class="form-check-input border-white"></th>
                            <th>HQ</th>
                            <th>Loket</th>
                            <th>Kategori</th>
                            <th>Tanggal</th>
                            <th>Jumlah Order</th>
                            <th>Harga</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        {{-- @foreach ($pemasukan as $data)
                  <tr>
                      <td><input type="checkbox" class="form-check-input select-item" data-id="{{ $data['id'] }}"></td>
                      <td>{{ $data['hq'] }}</td>
                      <td>{{ $data['loket'] }}</td>
                      <td>{{ $data['kategori'] }}</td>
                      <td>{{ $data['tanggal'] }}</td>
                      <td>{{ $data['jumlah_order'] }}</td>
                      <td>Rp {{ number_format($data['harga'], 0, ',', '.') }}</td>
                      <td>
                          <a href="" class="btn btn-icon"><i class="fi fi-br-pencil"></i></a>
                          <a href="" class="btn btn-icon delete-record"><i class="fi fi-br-trash"></i></a>
                      </td>
                  </tr>
                  @endforeach --}}
                        <tr>
                            <td><input type="checkbox" id="selectAll" class="form-check-input border-white"></td>
                            <td>HQ</td>
                            <td>Loket</td>
                            <td>Kategori</td>
                            <td>Tanggal</td>
                            <td>Jumlah Order</td>
                            <td>Harga</td>
                            <td>
                              <a href="javascript:void(0);"
                                  class="btn btn-icon">
                                  <i class="fi fi-br-pencil"></i>
                              </a>
                              <button type="button" class="btn btn-icon delete-record">
                                  <i class="fi fi-br-trash"></i>
                              </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="card-footer">
                <nav>
                    <ul class="pagination justify-content-end mb-0">
                        <li class="page-item disabled">
                            <a class="page-link" href="#"><i class="bx bx-chevron-left"></i></a>
                        </li>
                        <li class="page-item active">
                            <a class="page-link" href="#">1</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">2</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#"><i class="bx bx-chevron-right"></i></a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <div class="bottombar p-3">
            <div class="d-flex justify-content-between align-items-center">
                <!-- Placeholder for other content (if needed) -->
                <div></div>

                <!-- Total Price -->
                <div class="d-flex align-items-center">
                    <span class="fw-bold text-white">Rp <span id="totalPrice">0</span></span>
                </div>
            </div>
        </div>
      </div>


    </div>
@endsection
