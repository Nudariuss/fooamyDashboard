@php
    $container = 'container-fluid';
    $containerNav = 'container-fluid';
    $isNavbar = false;
@endphp

@extends('layouts/contentNavbarLayout')

@section('page-script')
    @vite('resources/assets/js/lokasi.js')
@endsection

@section('title', 'Edit Lokasi')

@section('content')
    <div class="container-fluid">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-style1">
                <li class="breadcrumb-item">
                    <a href="{{ url('/') }}">Dashboard</a>
                </li>
                <li class="breadcrumb-item">
                    Lokasi
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('lokasi-list', ['type' => strtolower($selectedOption)]) }}">{{ $selectedOption }}</a>
                </li>
                <li class="breadcrumb-item active">
                    Edit Lokasi {{ $selectedOption }}
                </li>
            </ol>
        </nav>

        <!-- Title -->
        <x-judul title="Edit Lokasi {{ $selectedOption }}" />

        <!-- Card Edit Lokasi -->
        <div class="card">
            <div class="card-body">
                <form
                    action="{{ route('lokasi-update', ['type' => strtolower($selectedOption), 'id' => $lokasi->hq_id ?? $lokasi->locket_id]) }}"
                    method="post">
                    @csrf
                    @method('PUT')

                    <!-- ID dan Nama -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="id" class="form-label"><strong>ID {{ $selectedOption }}</strong></label>
                            <input type="text" class="form-control" id="id" name="id"
                                value="{{ $lokasi->hq_id ?? $lokasi->locket_id }}" readonly>
                        </div>
                        <div class="col-md-6">
                            <label for="nama" class="form-label"><strong>Nama Lokasi</strong></label>
                            <input type="text" class="form-control" id="nama" name="nama"
                                value="{{ $lokasi->name }}" required>
                        </div>
                    </div>

                    <!-- Alamat -->
                    <div class="mb-3">
                        <label for="alamat" class="form-label"><strong>Alamat</strong></label>
                        <textarea class="form-control" id="alamat" name="alamat" rows="3" required>{{ $lokasi->address }}</textarea>
                    </div>

                    <!-- Koordinat -->
                    <div class="mb-3">
                        <label for="koordinat" class="form-label"><strong>Koordinat</strong></label>
                        <input type="text" class="form-control" id="koordinat" name="koordinat"
                            placeholder="Latitude Longitude"
                            value="{{ str_replace(['POINT(', ')'], '', $lokasi->coordinate) }}" required>
                    </div>


                    <!-- Tombol Save -->
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
