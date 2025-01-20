@php
$container = 'container-fluid';
$containerNav = 'container-fluid';
$isNavbar = false;
@endphp

@extends('layouts/contentNavbarLayout')

@section('page-script')
@vite('resources/assets/js/list-pakaian.js')
@endsection

@section('title', 'List Pakaian')

@section('content')
<div class="container-fluid">
    <x-judul title="List Pakaian" />
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-style1">
            <li class="breadcrumb-item">
                <a href="{{ url('/') }}">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Pakaian</li>
        </ol>
    </nav>
    <!--/ Breadcrumb -->

    <!-- Card -->
    <div class="card">
        <div class="card-body">
            <!-- Filter Section -->
            <div class="row mb-4">
                <!-- Search Bar -->
                <div class="col-md-6">
                    <form class="d-flex align-items-center">
                        <div class="input-group">
                            <span class="input-group-text"><i class="bx bx-search"></i></span>
                            <input type="text" class="form-control" placeholder="Search Pakaian">
                        </div>
                    </form>
                </div>
                <!-- Add Button -->
                <div class="col-md-6 d-flex justify-content-end align-items-center">
                    <a href="{{ route('filter-pakaian') }}" class="btn btn-primary me-2">
                        <i class="bx bx-filter"></i> Filter
                    </a>
                    <a href="{{ route('add-pakaian') }}" class="btn btn-primary">
                        <i class="bx bx-plus"></i> Add
                    </a>
                </div>
            </div>

            <!-- Pakaian Cards -->
            <div class="row">
                @foreach ($pakaian as $item)
                <div class="col-md-3 mb-4">
                    <div class="card h-100">
                        <img src="{{ asset($item['image']) }}" class="card-img-top" alt="Pakaian">
                        <div class="card-body">
                            <h4 class="card-title">{{ $item['nama'] }}</h4>
                            <p class="card-text">{{ $item['deskripsi'] }}</p>
                            <h5 class="card-text fw-bold">Rp {{ number_format($item['harga'], 0, ',', '.') }}</h5>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
