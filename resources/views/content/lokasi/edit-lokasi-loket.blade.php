@php
$container = 'container-fluid';
$containerNav = 'container-fluid';
$isNavbar = false;
@endphp

@extends('layouts/contentNavbarLayout')

@section('title', 'Edit Lokasi Loket')

@section('content')
<div class="container-fluid">
    <x-judul title="Edit Lokasi Loket" />
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
            <a href="{{ url('/lokasi/loket/{id_loket}/edit') }}">Edit Lokasi Loket</a>
          </li>
      </ol>
    </nav>
    <div class="card">
      <div class="card-body">
        <form action="{{ route('update-lokasi-loket', ['id_loket' => $loket['id_loket']]) }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="id_hq" class="form-label">ID HQ</label>
                    <input type="number" class="form-control" id="id_hq" name="id_hq" value="{{ $loket['id_hq'] }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="id_loket" class="form-label">ID Loket</label>
                    <input type="number" class="form-control" id="id_loket" name="id_loket" value="{{ $loket['id_loket'] }}">
                </div>
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Loket</label>
                <input type="text" class="form-control" id="nama" name="nama" value="{{ $loket['nama'] }}">
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat Loket</label>
                <textarea class="form-control" id="alamat" name="alamat">{{ $loket['alamat'] }}</textarea>
            </div>
            <div class="mb-3">
                <label for="koordinat" class="form-label">Koordinat</label>
                <input type="text" class="form-control" id="koordinat" name="koordinat" value="{{ $loket['koordinat'] }}">
            </div>
            <div class="d-flex justify-content-end">
              <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
      </div>
    </div>
</div>
@endsection
