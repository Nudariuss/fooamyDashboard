@php
$container = 'container-fluid';
$containerNav = 'container-fluid';
$isNavbar = false;
@endphp

@extends('layouts/contentNavbarLayout')

@section('page-script')
@vite('resources/assets/js/edit-lokasi-hq.js')
@endsection

@section('title', 'Edit Lokasi HQ')

@section('content')
<div class="container-fluid">
    <x-judul title="Edit Lokasi HQ" />
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
            <a href="{{ url('/lokasi/hq/{id_hq}/edit') }}">Edit Lokasi HQ</a>
        </li>
      </ol>
    </nav>

    <!-- Edit Lokasi HQ -->
    <div class="card">
        <div class="card-body">
            <form action="{{ route('update-lokasi-hq', ['id_hq' => $lokasi['id_hq']]) }}" method="post">
                @csrf
                @method('PUT')
                <!-- ID HQ and Nama Lokasi -->
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="id_hq" class="form-label">ID HQ</label>
                        <input type="text" class="form-control" id="id_hq" name="id_hq" value="{{ $lokasi['id_hq'] }}" readonly>
                    </div>
                    <div class="col-md-6">
                        <label for="nama" class="form-label">Nama Lokasi</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="{{ $lokasi['nama'] }}" required>
                    </div>
                </div>

                <!-- Alamat -->
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <textarea class="form-control" id="alamat" name="alamat" rows="3" required>{{ $lokasi['alamat'] }}</textarea>
                </div>

                <!-- Koordinat -->
                <div class="mb-3">
                    <label for="koordinat" class="form-label">Koordinat</label>
                    <input type="text" class="form-control" id="koordinat" name="koordinat" value="{{ $lokasi['koordinat'] }}" required>
                </div>

                <!-- Submit Button -->
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
