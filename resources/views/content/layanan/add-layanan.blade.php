@php
$container = 'container-fluid';
$containerNav = 'container-fluid';
$isNavbar = false;
@endphp

@extends('layouts/contentNavbarLayout')

@section('title', 'Add Layanan')

@section('content')
<div class="container-fluid">
    <x-judul title="Add Layanan" />
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-style1">
            <li class="breadcrumb-item">
                <a href="{{ url('/') }}">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{ route('layanan-list') }}">Layanan</a>
            </li>
            <li class="breadcrumb-item active">Add Layanan</li>
        </ol>
    </nav>
    <!--/ Breadcrumb -->

    <!-- Add Layanan Form -->
    <div class="card">
        <div class="card-body">
          <h5>Add Layanan</h5>
            <form action="{{ route('layanan-add') }}" method="get">
                @csrf
                <!-- Nama -->
                <div class="mb-3">
                    <label for="namaLayanan" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="namaLayanan" name="nama" placeholder="Nama Layanan" required>
                </div>

                <!-- Tipe -->
                <div class="mb-3">
                    <label for="tipeLayanan" class="form-label">Tipe</label>
                    <select id="tipeLayanan" name="tipe" class="form-select" required>
                        <option value="Reguler" selected>Reguler</option>
                        <option value="Express">Express</option>
                    </select>
                </div>

                <!-- Layanan -->
                <div class="mb-3">
                    <label for="jenisLayanan" class="form-label">Layanan</label>
                    <input type="text" class="form-control" id="jenisLayanan" name="layanan" placeholder="Jenis Layanan" required>
                </div>

                <!-- Harga -->
                <div class="mb-3">
                    <label for="hargaLayanan" class="form-label">Harga</label>
                    <div class="input-group">
                        <span class="input-group-text">Rp</span>
                        <input type="number" class="form-control" id="hargaLayanan" name="harga" placeholder="Harga Layanan" required>
                    </div>
                </div>

                <!-- Deskripsi -->
                <div class="mb-3">
                    <label for="deskripsiLayanan" class="form-label">Deskripsi</label>
                    <textarea id="deskripsiLayanan" name="deskripsi" class="form-control" rows="3" placeholder="Deskripsi Layanan"></textarea>
                </div>

                <!-- Picture -->
                <div class="mb-3">
                    <label for="pictureLayanan" class="form-label">Picture</label>
                    <div class="d-flex align-items-center">
                        <input type="file" class="form-control" id="pictureLayanan" name="picture" accept="image/*" required>
                    </div>
                </div>

                <!-- Edit Button -->
                <div class="text-end">
                  <a href="{{ route('layanan-list') }}" class="btn btn-primary">Add Layanan</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
