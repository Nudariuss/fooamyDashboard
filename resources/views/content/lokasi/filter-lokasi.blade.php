@php
    $container = 'container-fluid';
    $containerNav = 'container-fluid';
    $isNavbar = false;
@endphp

@extends('layouts/contentNavbarLayout')

@section('title', 'Filter Lokasi')

@section('content')
    <div class="container-fluid">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-style1">
                <li class="breadcrumb-item">
                    <a href="{{ url('/') }}">Dashboard</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('lokasi-list', ['type' => strtolower($type)]) }}">Lokasi</a>
                </li>
                <li class="breadcrumb-item active">
                    Filter Lokasi
                </li>
            </ol>
        </nav>

        <x-judul title="Filter Lokasi" />

        <!-- Filter Form -->
        <div class="card">
            <div class="card-body">
                <form action="{{ route('lokasi-list', ['type' => strtolower($type)]) }}" method="GET" class="fw-bold">
                    @csrf

                    <!-- Pilih Tipe Lokasi -->
                    <label for="type" class="form-label">Tipe Lokasi</label>
                    <select id="type" name="type" class="form-select mb-3">
                        <option value="">-- Semua Tipe --</option>
                        <option value="hq">HQ</option>
                        <option value="locket">Locket</option>
                    </select>

                    <!-- Cari Nama Lokasi -->
                    <label for="nama" class="form-label">Cari Nama Lokasi</label>
                    <input type="text" id="nama" name="nama" class="form-control mb-3"
                        placeholder="Masukkan Nama Lokasi">

                    <!-- Cari Alamat -->
                    <label for="alamat" class="form-label">Cari Alamat Lokasi</label>
                    <input type="text" id="alamat" name="alamat" class="form-control mb-3"
                        placeholder="Masukkan Alamat Lokasi">

                    <!-- Cari Koordinat -->
                    <label for="koordinat" class="form-label">Cari Koordinat Lokasi</label>
                    <input type="text" id="koordinat" name="koordinat" class="form-control mb-3"
                        placeholder="Contoh: -6.2146 106.8451">


                    <!-- Dropdown HQ (Hanya untuk Locket) -->
                    @if (strtolower($type) === 'locket')
                        <div class="mb-3">
                            <label for="hq_id" class="form-label"><strong>Pilih HQ</strong></label>
                            <select id="hq_id" name="hq_id" class="form-select mb-3">
                                <option value="">-- Semua HQ --</option>
                                @foreach ($hqs as $hq)
                                    <option value="{{ $hq->hq_id }}"
                                        {{ request('hq_id') == $hq->hq_id ? 'selected' : '' }}>
                                        {{ $hq->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    @endif

                    <!-- Tombol Filter -->
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">Terapkan Filter</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
