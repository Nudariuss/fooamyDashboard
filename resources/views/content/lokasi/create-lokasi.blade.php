@php
    $container = 'container-fluid';
    $containerNav = 'container-fluid';
    $isNavbar = false;
@endphp

@extends('layouts/contentNavbarLayout')

@section('page-script')
    @vite('resources/assets/js/lokasi.js')
@endsection

@section('title', 'Tambah Lokasi')

@section('content')
    <div class="container-fluid">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-style1">
                <li class="breadcrumb-item">
                    <a href="{{ url('/') }}">Dashboard</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('lokasi-list', ['type' => $type ?? 'hq']) }}">Lokasi</a>
                </li>
                <li class="breadcrumb-item active">
                    Tambah Lokasi</a>
                </li>
            </ol>
        </nav>

        <!-- Title -->
        <x-judul title="Tambah Lokasi" />

        <!-- Add Form -->
        <div class="card">
            <div class="card-body">
                <form action="{{ route('lokasi-store', ['type' => $type]) }}" method="post">
                    @csrf
                    <!-- Pilihan Tipe Lokasi -->
                    <div class="col-md-3 mb-3">
                        <label for="type" class="form-label"><strong>Tipe Lokasi</strong></label>
                        <select id="type" name="type" class="form-select" required>
                            <option value="hq" {{ $type === 'hq' ? 'selected' : '' }}>HQ</option>
                            <option value="locket" {{ $type === 'locket' ? 'selected' : '' }}>Locket</option>
                        </select>
                    </div>

                    <!-- Nama Lokasi -->
                    <div class="mb-3">
                        <label for="nama" class="form-label"><strong>Nama Lokasi</strong></label>
                        <input type="text" class="form-control" id="nama" name="nama"
                            placeholder="Masukkan Nama Lokasi" required>
                    </div>

                    <!-- Alamat -->
                    <div class="mb-3">
                        <label for="alamat" class="form-label"><strong>Alamat</strong></label>
                        <textarea class="form-control" id="alamat" name="alamat" rows="3" placeholder="Masukkan Alamat Lokasi"
                            required></textarea>
                    </div>

                    <!-- Koordinat -->
                    <div class="mb-3">
                        <label for="koordinat" class="form-label"><strong>Koordinat</strong></label>
                        <input type="text" class="form-control" id="koordinat" name="koordinat"
                            placeholder="Contoh: -6.2146 106.8451" required>
                    </div>

                    <!-- HQ ID (Dropdown hanya jika tipe lokasi adalah locket) -->
                    <div class="col-md-3 mb-3" id="hqField" style="{{ $type === 'locket' ? '' : 'display: none;' }}">
                        <label for="hq_id" class="form-label"><strong>Pilih HQ</strong></label>
                        <select id="hq_id" name="hq_id" class="form-select"
                            {{ $type === 'locket' ? 'required' : '' }}>
                            <option value="" disabled selected>-- Pilih HQ --</option>
                            @foreach ($hqs as $hq)
                                <option value="{{ $hq->hq_id }}">{{ $hq->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Tombol Simpan -->
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
