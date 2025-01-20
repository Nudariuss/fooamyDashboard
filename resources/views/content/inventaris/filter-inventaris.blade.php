@php
    $container = 'container-fluid';
    $containerNav = 'container-fluid';
    $isNavbar = false;
@endphp

@extends('layouts/contentNavbarLayout')

@section('title', 'Filter Inventaris')

@section('content')
<div class="container-fluid">
    <x-judul title="Advanced Filter Inventaris" />

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-style1">
            <li class="breadcrumb-item">
                <a href="{{ url('/') }}">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{ route('list-inventaris') }}">List Inventaris</a>
            </li>
            <li class="breadcrumb-item active">Filter Inventaris</li>
        </ol>
    </nav>

    <!-- Filter Form -->
    <div class="card">
        <div class="card-body">
            <form method="GET" action="{{ route('list-inventaris') }}">
                <!-- Search Bar -->
                <div class="row mb-3">
                    <div class="col-md-12">
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="bx bx-search"></i>
                            </span>
                            <input type="text" class="form-control" name="search" placeholder="Cari inventaris...">
                        </div>
                    </div>
                </div>

                <!-- Jenis -->
                <div class="row mb-3">
                    <div class="col-md-12">
                        <h5 class="mb-2">Jenis</h5>
                        <div class="form-check form-check-inline">
                            <input type="checkbox" class="form-check-input" id="elektronik" name="jenis[]" value="elektronik">
                            <label class="form-check-label" for="elektronik">Elektronik</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="checkbox" class="form-check-input" id="furniture" name="jenis[]" value="furniture">
                            <label class="form-check-label" for="furniture">Furnitur</label>
                        </div>
                    </div>
                </div>

                <!-- Waktu -->
                <div class="row mb-3">
                    <div class="col-md-12">
                        <h5 class="mb-2">Waktu</h5>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" id="terbaru" name="waktu" value="terbaru" checked>
                            <label class="form-check-label" for="terbaru">Terbaru</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" id="terlama" name="waktu" value="terlama">
                            <label class="form-check-label" for="terlama">Terlama</label>
                        </div>
                    </div>
                </div>

                <!-- Harga -->
                <div class="row mb-3">
                    <div class="col-md-12">
                        <h5 class="mb-2">Harga</h5>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" id="tertinggi" name="harga" value="tertinggi" checked>
                            <label class="form-check-label" for="tertinggi">Tertinggi</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" id="terendah" name="harga" value="terendah">
                            <label class="form-check-label" for="terendah">Terendah</label>
                        </div>
                    </div>
                </div>

                <!-- Buttons -->
                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('list-inventaris') }}" class="btn btn-secondary">
                        <i class="bx bx-x"></i> Reset
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="bx bx-check"></i> Apply
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
