@php
$container = 'container-fluid';
$containerNav = 'container-fluid';
$isNavbar = false;
@endphp

@extends('layouts/contentNavbarLayout')

@section('title', 'Detail Keluhan Operasional')

@section('content')
<div class="container-fluid">
  <!-- Card Header -->
  <div class="card-header d-flex justify-content-between align-items-center">
      <x-judul title="{{ $keluhanDetail['judul_keluhan'] }} | {{ $keluhanDetail['tanggal'] }}" />
  </div>
  <!-- Breadcrumb -->
  <nav aria-label="breadcrumb">
      <ol class="breadcrumb breadcrumb-style1">
          <li class="breadcrumb-item">
              <a href="{{ url('/') }}">Dashboard</a>
          </li>
          <li class="breadcrumb-item">
              Keluhan
          </li>
          <li class="breadcrumb-item">
              <a href="{{ url('/keluhan/operasional/list') }}">Operasional</a>
          </li>
          <li class="breadcrumb-item active">
              <a href="{{ url('/keluhan/operasional/' . $keluhanDetail['id_keluhan'] . '/detail') }}">Detail</a>
          </li>
      </ol>
  </nav>
    <div class="card mb-3">

        <!-- Card Body -->
        <div class="card-body">

            <!-- Form Inputs -->
            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label">Email</label>
                    <input type="text" class="form-control" value="{{ $keluhanDetail['email'] }}" readonly>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Nama</label>
                    <input type="text" class="form-control" value="{{ $keluhanDetail['nama'] }}" readonly>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label">Role</label>
                    <input type="text" class="form-control" value="{{ $keluhanDetail['role'] }}" readonly>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Jenis</label>
                    <input type="text" class="form-control" value="{{ $keluhanDetail['jenis'] }}" readonly>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Deskripsi Keluhan</label>
                <textarea class="form-control" rows="5" readonly>{{ $keluhanDetail['keterangan'] }}</textarea>
            </div>
        </div>
    </div>

    <!-- Tanggapan Card -->
    <div class="card">
      <div class="card-body">
          <form action="{{ route('list-keluhan-operasional') }}" method="get">
              <label class="form-label">Tanggapan</label>
              <textarea class="form-control" rows="5" name="tanggapan"></textarea>
              <div class="d-flex justify-content-end mt-3">
                  <button type="submit" class="btn btn-primary">Kirim</button>
              </div>
          </form>
      </div>
  </div>
</div>
@endsection
