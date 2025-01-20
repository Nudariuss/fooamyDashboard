@php
$container = 'container-fluid';
$containerNav = 'container-fluid';
$isNavbar = false;
@endphp

@extends('layouts/contentNavbarLayout')

@section('page-script')
@vite('resources/assets/js/detail-lokasi-hq.js')
@endsection

@section('title', 'Detail Lokasi HQ')

@section('content')
<div class="container-fluid">
    <x-judul title="Detail Lokasi HQ" />
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
            <a href="{{ url('/lokasi/hq/{id_hq}/detail') }}">Detail Lokasi HQ</a>
        </li>
      </ol>
    </nav>

    <!-- Detail Lokasi HQ -->
    <div class="card">
        <div class="card-body">
            <form>
                <!-- ID HQ and Nama Lokasi -->
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="id_hq" class="form-label">ID HQ</label>
                        <input type="text" class="form-control" id="id_hq" name="id_hq" value="{{ $lokasi['id_hq'] }}" readonly>
                    </div>
                    <div class="col-md-6">
                        <label for="nama" class="form-label">Nama Lokasi</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="{{ $lokasi['nama'] }}" readonly>
                    </div>
                </div>

                <!-- Alamat -->
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <textarea class="form-control" id="alamat" name="alamat" rows="3" readonly>{{ $lokasi['alamat'] }}</textarea>
                </div>

                <!-- Koordinat -->
                <div class="mb-3">
                    <label for="koordinat" class="form-label">Koordinat</label>
                    <input type="text" class="form-control" id="koordinat" name="koordinat" value="{{ $lokasi['koordinat'] }}" readonly>
                </div>
            </form>

            <!-- Edit Button -->
            <div class="d-flex justify-content-end">
                <a href="{{ route('edit-lokasi-hq', ['id_hq' => $lokasi['id_hq']]) }}" class="btn btn-primary">Edit</a>
            </div>
        </div>
    </div>

    <!-- List Loket -->
    <div class="card mt-3">
        <div class="card-header">
            <h5 class="card-title">List Loket</h5>
        </div>
            <div class="card-datatable table-responsive text-nowrap">
                <table class="table border-bottom">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th>ID HQ</th>
                            <th>ID Loket</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Koordinat</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($lokets as $loket)
                        <tr>
                            <td>{{ $loket['id_hq'] }}</td>
                            <td>{{ $loket['id_loket'] }}</td>
                            <td>{{ $loket['nama'] }}</td>
                            <td>{{ $loket['alamat'] }}</td>
                            <td>{{ $loket['koordinat'] }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
    </div>
</div>
@endsection
