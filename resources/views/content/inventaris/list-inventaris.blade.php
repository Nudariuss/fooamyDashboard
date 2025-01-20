@php
$container = 'container-fluid';
$containerNav = 'container-fluid';
$isNavbar = false;
@endphp

@extends('layouts/contentNavbarLayout')

@section('page-script')
    @vite('resources/assets/js/list-inventaris.js')
@endsection

@section('title', 'List Inventaris')

@section('content')
<div class="container-fluid">
    <x-judul title="List Inventaris" />

    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-style1">
            <li class="breadcrumb-item">
                <a href="{{ url('/') }}">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">
                Inventaris
            </li>
        </ol>
    </nav>
    <!--/ Breadcrumb -->

    <!-- Bootstrap Table with Header -->
    <div class="card mb-3">
        <div class="card-header">
            <div class="row">
                <!-- Search Bar -->
                <div class="col-md-6">
                    <div class="input-group input-group-merge short-searchbar">
                        <span class="input-group-text" id="basic-addon-search"><i class="bx bx-search"></i></span>
                        <input type="text" class="form-control" placeholder="Cari Inventaris"
                            aria-label="Cari Inventaris" aria-describedby="basic-addon-search31" />
                    </div>
                </div>
                <div class="col-md-6 d-flex justify-content-end align-items-center gap-2">
                    <!-- View Log Button -->
                    <a href="javascript:void(0);" class="btn btn-primary">
                        <i class="bx bx-log"></i> View Log
                    </a>

                    <!-- Dropdown HQ -->
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            HQ
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="javascript:void(0);">HQ 1</a></li>
                            <li><a class="dropdown-item" href="javascript:void(0);">HQ 2</a></li>
                            <li><a class="dropdown-item" href="javascript:void(0);">HQ 3</a></li>
                        </ul>
                    </div>

                    <!-- Dropdown Loket -->
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Loket
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="javascript:void(0);">Loket 1</a></li>
                            <li><a class="dropdown-item" href="javascript:void(0);">Loket 2</a></li>
                            <li><a class="dropdown-item" href="javascript:void(0);">Loket 3</a></li>
                        </ul>
                    </div>

                    <!-- Filter Button -->
                    <a href="{{ route('filter-inventaris') }}" class="btn btn-primary">
                      <i class="bx bx-filter"></i> Filter
                    </a>
                </div>
            </div>
        </div>

        <!-- Table Section -->
        <div class="card-datatable table-responsive text-nowrap">
            <table class="table table-striped border-bottom">
                <thead class="bg-primary">
                    <tr>
                        <th><input type="checkbox" id="selectAll" class="form-check-input border-white"></th>
                        <th>Nama Barang</th>
                        <th>Jenis Barang</th>
                        <th>Kuantitas</th>
                        <th>Satuan Barang</th>
                        <th>Tahun Buat</th>
                        <th>Null</th>
                        <th>Harga</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($inventaris as $item)
                    <tr>
                        <td><input type="checkbox" class="form-check-input select-item" data-id="{{ $item['id'] }}"></td>
                        <td>{{ $item['nama_barang'] }}</td>
                        <td>{{ $item['jenis_barang'] }}</td>
                        <td>{{ $item['kuantitas'] }}</td>
                        <td>{{ $item['satuan_barang'] }}</td>
                        <td>{{ $item['tahun_buat'] }}</td>
                        <td>
                            <input type="checkbox" class="form-check-input" checked disabled>
                        </td>
                        <td>Rp {{ number_format($item['harga'], 0, ',', '.') }}</td>
                        <td>
                            <a href="" class="btn btn-icon"><i class="fi fi-br-pencil"></i></a>
                            <a href="" class="btn btn-icon delete-record"><i class="fi fi-br-trash"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination Section -->
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
@endsection
