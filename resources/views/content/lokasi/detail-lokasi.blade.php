@php
    $container = 'container-fluid';
    $containerNav = 'container-fluid';
    $isNavbar = false;
@endphp

@extends('layouts/contentNavbarLayout')

@section('page-script')
    @vite('resources/assets/js/lokasi.js')
@endsection

@section('title', 'Detail Lokasi')

@section('content')
    <div id="detail-lokasi-page" class="container-fluid">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-style1">
                <li class="breadcrumb-item">
                    <a href="{{ url('/') }}">Dashboard</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('lokasi-list', ['type' => strtolower($selectedOption)]) }}">Lokasi</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('lokasi-list', ['type' => strtolower($selectedOption)]) }}">{{ $selectedOption }}</a>
                </li>
                <li class="breadcrumb-item">
                    <a
                        href="{{ route('lokasi-detail', ['type' => strtolower($selectedOption), 'id' => $lokasi->hq_id ?? $lokasi->locket_id]) }}">
                        {{ $lokasi->hq_id ?? $lokasi->locket_id }}
                    </a>
                </li>
                <li class="breadcrumb-item active">
                  <a
                  href="{{ route('lokasi-detail', ['type' => strtolower($selectedOption), 'id' => $lokasi->hq_id ?? $lokasi->locket_id]) }}">
                  Detail
              </a>
                </li>
            </ol>
        </nav>

        <!-- Title -->
        <x-judul title="Detail Lokasi {{ $lokasi->name ?? 'Tanpa Nama' }} {{ $lokasi->hq_id ?? $lokasi->locket_id }}" />

        <!-- Card Detail Lokasi -->
        <div class="card mb-4">
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <p class="mb-1"><strong>ID {{ $selectedOption }}:</strong></p>
                        <p class="border p-2 rounded">{{ $lokasi->hq_id ?? $lokasi->locket_id }}</p>
                    </div>
                    <div class="col-md-6">
                        <p class="mb-1"><strong>Nama:</strong></p>
                        <p class="border p-2 rounded">{{ $lokasi->name }}</p>
                    </div>
                </div>
                <div class="mb-3">
                    <p class="mb-1"><strong>Alamat:</strong></p>
                    <p class="border p-2 rounded">{{ $lokasi->address }}</p>
                </div>
                <div class="col-md-6">
                  <p class="mb-1"><strong>Koordinat:</strong></p>
                  <input type="text" class="form-control" value="{{ $lokasi->coordinate }}" readonly>
                </div>
            </div>
            <div class="card-footer d-flex justify-content-end">
                <a href="{{ route('lokasi-edit', ['type' => strtolower($selectedOption), 'id' => $lokasi->hq_id ?? $lokasi->locket_id]) }}"
                    class="btn btn-primary">
                    Edit
                </a>
            </div>
        </div>


        <!-- Daftar Locket (Hanya untuk HQ) -->
        @if ($selectedOption === 'HQ' && $lokets->isNotEmpty())
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">List Locket</h5>
                </div>
                <div class="card-datatable table-responsive text-nowrap">
                    <table class="table table-striped border-bottom">
                        <thead class="bg-primary text-white">
                            <tr>
                                <th>ID HQ</th>
                                <th>ID Locket</th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>Koordinat</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($lokets as $loket)
                                <tr>
                                    <td>{{ $loket->hq_id }}</td>
                                    <td>{{ $loket->locket_id }}</td>
                                    <td>{{ $loket->name }}</td>
                                    <td>{{ $loket->address }}</td>
                                    <td>{{ $loket->coordinate }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                @if ($lokets->hasPages())
                    <div class="card-footer">
                        <nav class="d-flex justify-content-end">
                            {{ $lokets->links('pagination::bootstrap-4') }}
                        </nav>
                    </div>
                @endif
            </div>
        @endif

    </div>
@endsection
