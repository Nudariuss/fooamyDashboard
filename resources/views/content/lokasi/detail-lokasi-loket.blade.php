@php
$container = 'container-fluid';
$containerNav = 'container-fluid';
$isNavbar = false;
@endphp

@extends('layouts/contentNavbarLayout')

@section('title', 'Detail Lokasi Loket')

@section('content')
<div class="container-fluid">
    <x-judul title="Detail Lokasi Loket" />
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb breadcrumb-style1">
          <li class="breadcrumb-item">
              <a href="{{ url('/') }}">Dashboard</a>
          </li>
          <li class="breadcrumb-item">
              Lokasi
          </li>
          <li class="breadcrumb-item">
              <a href="{{ url('/lokasi/loket/list') }}">Loket</a>
          </li>
          <li class="breadcrumb-item active">
            <a href="{{ url('/lokasi/loket/{id_loket}/detail') }}">Detail Lokasi Loket</a>
        </li>
      </ol>
    </nav>
    <div class="card">
      <div class="card-body">

        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label">ID HQ</label>
                <input type="text" class="form-control" value="{{ $loket['id_hq'] }}" readonly>
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label">ID Loket</label>
                <input type="text" class="form-control" value="{{ $loket['id_loket'] }}" readonly>
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label">Nama Loket</label>
            <input type="text" class="form-control" value="{{ $loket['nama'] }}" readonly>
        </div>
        <div class="mb-3">
            <label class="form-label">Alamat Loket</label>
            <textarea class="form-control" readonly>{{ $loket['alamat'] }}</textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Koordinat</label>
            <input type="text" class="form-control" value="{{ $loket['koordinat'] }}" readonly>
        </div>
        <div class="d-flex justify-content-end">
          <a href="{{ route('edit-lokasi-loket', ['id_loket' => $loket['id_loket']]) }}" class="btn btn-primary">Edit</a>
        </div>
      </div>
    </div>
</div>
@endsection
