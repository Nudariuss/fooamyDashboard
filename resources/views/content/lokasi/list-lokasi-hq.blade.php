@php
    $container = 'container-fluid';
    $containerNav = 'container-fluid';
    $isNavbar = false;
@endphp

@extends('layouts/contentNavbarLayout')

@section('page-script')
    @vite('resources/assets/js/list-lokasi-hq.js')
@endsection

@section('title', 'List Lokasi HQ')

@section('content')
    <div class="container-fluid">
        <x-judul title="List Lokasi HQ" />
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-style1">
                <li class="breadcrumb-item">
                    <a href="{{ url('/') }}">Dashboard</a>
                </li>
                <li class="breadcrumb-item">
                    Lokasi
                </li>
                <li class="breadcrumb-item active">
                    <a href="{{ url('/lokasi/hq/list') }}">HQ</a>
                </li>
            </ol>
        </nav>
        <!--/ Breadcrumb -->

        <!-- Bootstrap Table with Header - Dark -->
        <div class="card mb-3">
            <div class="card-header">
                <div class="row">
                    <!-- Search Bar -->
                    <div class="col-md-6">
                        <div class="input-group input-group-merge short-searchbar">
                            <span class="input-group-text" id="basic-addon-search"><i class="bx bx-search"></i></span>
                            <input type="text" class="form-control" placeholder="Cari Lokasi HQ"
                                aria-label="Cari Lokasi HQ" aria-describedby="basic-addon-search31" />
                        </div>
                    </div>
                    <div class="col-md-6 d-flex justify-content-end align-items-center gap-2">
                        <!-- Add Button -->
                        <a href="{{ route('add-lokasi-hq') }}" class="btn btn-primary">
                            <i class="bx bx-plus"></i>
                        </a>

                        <!-- Dropdown Button -->
                        <div class="btn-group">
                          <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                              {{ $selectedOption }}
                          </button>
                          <ul class="dropdown-menu">
                              <li><a class="dropdown-item {{ $selectedOption == 'HQ' ? 'active' : '' }}" href="{{ route('list-lokasi-hq') }}">HQ</a></li>
                              <li><a class="dropdown-item {{ $selectedOption == 'Loket' ? 'active' : '' }}" href="{{ route('list-lokasi-loket') }}">Loket</a></li>
                          </ul>
                        </div>

                        <!-- Filter Button -->
                        <a href="{{ route('filter-pakaian') }}" class="btn btn-primary">
                            <i class="bx bx-filter"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Table Section -->
            <div class="card-datatable table-responsive text-nowrap">
                <table class="table border-bottom"> <!-- Add border-bottom class -->
                    <thead class="bg-primary">
                        <tr>
                            <th><input type="checkbox" id="selectAll" class="form-check-input border-white"></th>
                            <th>ID HQ</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Koordinat</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($lokasihq as $item)
                            <tr>
                                <td>
                                    <input type="checkbox" class="form-check-input select-item"
                                        data-id="{{ $item['id_hq'] }}">
                                </td>
                                <td>{{ $item['id_hq'] }}</td>
                                <td>{{ $item['nama'] }}</td>
                                <td>{{ $item['alamat'] }}</td>
                                <td>{{ $item['koordinat'] }}</td>
                                <td>
                                    <a href="{{ route('detail-lokasi-hq', ['id_hq' => $item['id_hq']]) }}" class="btn btn-icon"><i class="fi fi-br-pencil"></i></a>
                                    <a href="" class="btn btn-icon delete-record"><i class="fi fi-br-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Pagination Section -->
            <div class="card-footer">
                <nav class="">
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


        <!--/ Bootstrap Table with Header Dark -->
    @endsection
