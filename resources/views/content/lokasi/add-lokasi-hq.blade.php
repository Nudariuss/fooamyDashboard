@php
$container = 'container-fluid';
$containerNav = 'container-fluid';
$isNavbar = false;
@endphp

@extends('layouts/contentNavbarLayout')

@section('page-script')
@vite('resources/assets/js/add-lokasi-hq.js')
@endsection

@section('title', 'Tambah Lokasi HQ')

@section('content')
<div class="container-fluid">
    <x-judul title="Tambah Lokasi HQ" />
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
              <a href="{{ url('/lokasi/hq/list') }}">HQ</a>
          </li>
          <li class="breadcrumb-item active">
            <a href="{{ url('/lokasi/hq/add') }}">Add HQ</a>
        </li>
      </ol>
    </nav>

    <!-- Add Form -->
    <div class="card">
        <div class="card-body">
            <form action="{{ route('store-lokasi-hq') }}" method="post">
                @csrf
                <!-- ID HQ and Nama Lokasi in the same row -->
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="id_hq" class="form-label">ID HQ</label>
                        <input type="text" class="form-control" id="id_hq" name="id_hq" placeholder="Masukkan ID HQ" required>
                    </div>
                    <div class="col-md-6">
                        <label for="nama" class="form-label">Nama Lokasi</label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama Lokasi" required>
                    </div>
                </div>

                <!-- Alamat -->
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <textarea class="form-control" id="alamat" name="alamat" rows="3" placeholder="Masukkan Alamat Lokasi" required></textarea>
                </div>

                <!-- Koordinat -->
                <div class="mb-3">
                    <label for="koordinat" class="form-label">Koordinat</label>
                    <input type="text" class="form-control" id="koordinat" name="koordinat" placeholder="Contoh: 6.1840° S, 106.7681° E" required>
                </div>

                <!-- Submit Button -->
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
