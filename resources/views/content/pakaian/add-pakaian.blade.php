@php
$container = 'container-fluid';
$containerNav = 'container-fluid';
$isNavbar = false;
@endphp

@extends('layouts/contentNavbarLayout')

@section('page-script')
@vite('resources/assets/js/add-pakaian.js')
@endsection

@section('title', 'Add Pakaian')

@section('content')
<div class="container-fluid">
    <x-judul title="Add Pakaian" />
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-style1">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('list-pakaian') }}">Pakaian</a></li>
            <li class="breadcrumb-item active">Add</li>
        </ol>
    </nav>

    <!-- Add Form -->
    <div class="card">
        <div class="card-body">
            <form action="{{ route('list-pakaian') }}" method="get" enctype="multipart/form-data">
                @csrf
                <!-- Kategori dan Sub Kategori -->
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="kategori" class="form-label">Kategori</label>
                        <input type="text" class="form-control" id="kategori" name="kategori">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="kategori_sub" class="form-label">Kategori Sub</label>
                        <input type="text" class="form-control" id="kategori_sub" name="kategori_sub">
                    </div>
                </div>
                <!-- Nama dan Harga -->
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="harga" class="form-label">Harga Satuan</label>
                        <div class="input-group">
                            <span class="input-group-text">Rp</span>
                            <input type="number" class="form-control" id="harga" name="harga">
                        </div>
                    </div>
                </div>
                <!-- Satuan dan Kilogram (Checkbox Biasa) -->
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="satuan" name="satuan">
                            <label for="satuan" class="form-check-label">Satuan</label>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="kilogram" name="kilogram">
                            <label for="kilogram" class="form-check-label">Kilogram</label>
                        </div>
                    </div>
                </div>
                <!-- Upload File -->
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="image" class="form-label">Upload File</label>
                        <div class="input-group">
                            <input type="file" class="form-control" id="image" name="image">
                            <button class="btn btn-primary" type="button">Browse</button>
                        </div>
                    </div>
                </div>
                <!-- Buttons -->
                <div class="d-flex justify-content-end mt-4">
                  <a href="{{ route('list-pakaian') }}" class="btn btn-primary">Add</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
