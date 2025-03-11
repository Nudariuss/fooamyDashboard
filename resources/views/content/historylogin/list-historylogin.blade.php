@php
    $container = 'container-fluid';
    $containerNav = 'container-fluid';
    $isNavbar = false;
@endphp

@extends('layouts/contentNavbarLayout')

@section('page-script')
    @vite('resources/assets/js/list-historylogin.js')
@endsection

@section('title', 'List History Login')

@section('content')
    <div class="content">
      <div class="container-fluid">
        <x-judul title="List History Login" />
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-style1">
                <li class="breadcrumb-item">
                    <a href="{{ url('/') }}">Dashboard</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="javascript:void(0);">History Login</a>
                </li>
                {{-- <li class="breadcrumb-item active">
                    <a href="{{ route('laporan-keuangan-pengeluaran') }}">Pengeluaran</a>
                </li> --}}
            </ol>
        </nav>

        <!-- Table Section -->
        <div class="card mb-3">
            <div class="card-header">
                <div class="row">
                    <!-- Search Bar -->
                    <div class="col-md-6">
                        <div class="input-group input-group-merge short-searchbar">
                            <span class="input-group-text" id="basic-addon-search"><i class="bx bx-search"></i></span>
                            <input type="text" class="form-control" placeholder="Cari Pengeluaran"
                                aria-label="Cari Pengeluaran" aria-describedby="basic-addon-search31" />
                        </div>
                    </div>
                    <div class="col-md-6 d-flex justify-content-end align-items-center gap-2">

                        <!-- Dropdown Pemasukan/Pengeluaran -->
                        <div class="btn-group">
                            <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Customer
                            </button>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item active" href="javascript:void(0);">Customer</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="javascript:void(0);">Management</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="javascript:void(0);">Mitra</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="javascript:void(0);">Operational</a>
                                </li>
                            </ul>
                        </div>

                        <!-- Filter Button -->
                        <a href="{{ route('laporan-filter', ['type' => 'pengeluaran']) }}" class="btn btn-primary">
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
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Lokasi</th>
                            <th>Tanggal</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        {{-- @foreach ($pengeluaran as $data)
                        <tr>
                            <td><input type="checkbox" class="form-check-input select-item" data-id="{{ $data['id'] }}"></td>
                            <td>{{ $data['hq'] }}</td>
                            <td>{{ $data['loket'] }}</td>
                            <td>{{ $data['kategori'] }}</td>
                            <td>{{ $data['tanggal'] }}</td>
                            <td>{{ $data['jumlah_transaksi'] }}</td>
                            <td>Rp {{ number_format($data['harga'], 0, ',', '.') }}</td>
                            <td>
                                <a href="" class="btn btn-icon"><i class="fi fi-br-pencil"></i></a>
                                <a href="" class="btn btn-icon delete-record"><i class="fi fi-br-trash"></i></a>
                            </td>
                        </tr>
                        @endforeach --}}
                        <tr>
                            <td><input type="checkbox" id="selectAll" class="form-check-input border-white"></td>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Lokasi</th>
                            <th>Tanggal</th>
                            <td>
                                <a href="javascript:void(0);" class="btn btn-icon">
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
      </div>

    </div>
@endsection
