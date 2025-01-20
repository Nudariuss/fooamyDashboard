@php
$container = 'container-fluid';
$containerNav = 'container-fluid';
$isNavbar = false;
@endphp

@extends('layouts/contentNavbarLayout')

@section('page-script')
    @vite('resources/assets/js/list-promo.js')
@endsection

@section('title', 'List Promo')

@section('content')
<div class="container-fluid">
    <x-judul title="List Promo" />

    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-style1">
            <li class="breadcrumb-item">
                <a href="{{ url('/') }}">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">
              <a href="{{ url('/promo/list') }}">Promo</a>
            </li>
        </ol>
    </nav>
    <!--/ Breadcrumb -->

    <!-- Promo Summary -->
    <div class="row mb-4">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h4>Promo 1</h4>
                        <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </div>
                    <h1 class="text-primary mb-0 fw-bold">20</h1>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h4>Promo 2</h4>
                        <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </div>
                    <h1 class="text-primary mb-0 fw-bold">35</h1>
                </div>
            </div>
        </div>
    </div>

    <!-- Promo List -->
    <div class="card mb-3">
        <div class="card-header">
            <div class="row">
                <!-- Search Bar -->
                <div class="col-md-6">
                    <div class="input-group input-group-merge short-searchbar">
                        <span class="input-group-text" id="basic-addon-search"><i class="bx bx-search"></i></span>
                        <input type="text" class="form-control" placeholder="Cari Promo"
                            aria-label="Cari Promo" aria-describedby="basic-addon-search31" />
                    </div>
                </div>
                <div class="col-md-6 d-flex justify-content-end align-items-center gap-2">
                    <!-- Add Button -->
                    <a href="javascript:void(0);" class="btn btn-primary">
                        <i class="bx bx-plus"></i>
                    </a>

                    <!-- Filter Button -->
                    <a href="javascript:void(0);" class="btn btn-primary">
                        <i class="bx bx-filter"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- Table Section -->
        <div class="card-datatable table-responsive text-nowrap">
            <table class="table border-bottom">
                <thead class="bg-primary">
                    <tr>
                        <th><input type="checkbox" id="selectAll" class="form-check-input border-white"></th>
                        <th>Nama Promo</th>
                        <th>Maks Penggunaan</th>
                        <th>Maks Pemakaian/Akun</th>
                        <th>Terpakai</th>
                        <th>Sisa</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($promos as $promo)
                    <tr>
                        <td><input type="checkbox" class="form-check-input select-item" data-id="{{ $promo['id'] }}"></td>
                        <td>{{ $promo['nama'] }}</td>
                        <td>{{ $promo['maks_penggunaan'] }}</td>
                        <td>{{ $promo['maks_akun'] }}</td>
                        <td>{{ $promo['terpakai'] }}</td>
                        <td>{{ $promo['sisa'] }}</td>
                        <td>
                            <span class="badge {{ $promo['status'] == 'active' ? 'bg-success' : 'bg-secondary' }}">
                                {{ ucfirst($promo['status']) }}
                            </span>
                        </td>
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
