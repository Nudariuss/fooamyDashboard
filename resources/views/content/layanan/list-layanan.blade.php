@php
    $container = 'container-fluid';
    $containerNav = 'container-fluid';
    $isNavbar = false;
@endphp

@extends('layouts/contentNavbarLayout')

@section('page-script')
    @vite('resources/assets/js/list-layanan.js')
@endsection

@section('title', 'List Layanan')

@section('content')
    <div class="container-fluid">
        <x-judul title="List Layanan" />
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-style1">
                <li class="breadcrumb-item">
                    <a href="{{ url('/') }}">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Layanan</li>
            </ol>
        </nav>
        <!--/ Breadcrumb -->

        <!-- Card: Filter and Table Combined -->
        <div class="card">
            <div class="card-header">
                <!-- Filter Section -->
                <div class="row">
                    <!-- Search Bar on the Left -->
                    <div class="col-md-6">
                        <form class="d-flex align-items-center">
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon1">
                                    <i class="bx bx-search"></i>
                                </span>
                                <input type="text" class="form-control" placeholder="Search layanan" aria-label="Search">
                            </div>
                        </form>
                    </div>

                    <!-- Buttons and Dropdown on the Right -->
                    <div class="col-md-6 d-flex justify-content-end align-items-center">
                        <!-- Add Button -->
                        <a href="{{ route('layanan-add') }}" class="btn btn-primary me-2">
                            <i class="bx bx-plus"></i> <!-- Boxicons Filter Icon -->
                        </a>

                        <!-- Dropdown -->
                        <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle me-2" type="button" id="dropdownMenuButton"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Layanan
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <li><a class="dropdown-item" href="#">Layanan</a></li>
                                <li><a class="dropdown-item" href="#">Pakaian</a></li>
                            </ul>
                        </div>
                        <a href="{{ route('filter-layanan') }}" class="btn btn-primary">
                            <i class="bx bx-filter"></i> <!-- Boxicons Filter Icon -->
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
                            <th>Nama</th>
                            <th>Tipe</th>
                            <th>Layanan</th>
                            <th>Harga</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($layanan as $item)
                            <tr>
                              <td><input type="checkbox" class="form-check-input select-item"></td>
                                <td>{{ $item['nama'] }}</td>
                                <td>{{ $item['tipe'] }}</td>
                                <td>{{ $item['layanan'] }}</td>
                                <td>{{ $item['harga'] }}</td>
                                <td>
                                  <a href="" class="btn btn-icon"><i class="fi fi-br-pencil"></i></a>
                                  <a href="" class="btn btn-icon delete-record"><i class="fi fi-br-trash"></i></a>
                              </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer">

                <!-- Pagination -->
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
