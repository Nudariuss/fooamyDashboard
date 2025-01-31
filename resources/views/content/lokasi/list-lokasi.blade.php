@php
    $container = 'container-fluid';
    $containerNav = 'container-fluid';
    $isNavbar = false;
@endphp

@extends('layouts/contentNavbarLayout')

@section('page-script')
    @vite('resources/assets/js/lokasi.js')
@endsection

@section('title', 'List Lokasi')

@section('content')
    <div class="container-fluid">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-style1">
                <li class="breadcrumb-item">
                    <a href="{{ url('/') }}">Dashboard</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('lokasi-list', ['type' => strtolower($selectedOption)]) }}">Lokasi</a>
                </li>
                <li class="breadcrumb-item active">
                    {{ $selectedOption }}
                </li>
            </ol>
        </nav>
        <x-judul title="List Lokasi {{ $selectedOption }}" />

        <!-- Card with Header -->
        <div class="card mb-3">
            <div class="card-header">
                <div class="row">
                    <!-- Form Pencarian -->
                    <div class="col-md-6">
                        <form method="GET" action="{{ route('lokasi-list') }}" class="d-flex">
                            <input type="hidden" name="type" value="{{ $selectedOption }}" />
                            <div class="input-group input-group-merge short-searchbar">
                                <span class="input-group-text" id="basic-addon-search"><i class="bx bx-search"></i></span>
                                <input type="text" class="form-control" name="search"
                                    placeholder="Cari {{ $selectedOption }}" value="{{ request('search') }}"
                                    aria-label="Cari {{ $selectedOption }}" />
                            </div>
                        </form>
                    </div>

                    <!-- Dropdown dan Button -->
                    <div class="col-md-6 d-flex justify-content-end align-items-center gap-2">
                        <a href="{{ route('lokasi-create', ['type' => strtolower($selectedOption)]) }}"
                            class="btn btn-primary">
                            <i class="bx bx-plus"></i>
                        </a>
                        <!-- Dropdown -->
                        <div class="btn-group">
                            <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                {{ $selectedOption }}
                            </button>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item {{ $selectedOption == 'HQ' ? 'active' : '' }}"
                                        href="{{ route('lokasi-list', ['type' => 'hq']) }}">
                                        HQ
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item {{ $selectedOption == 'Locket' ? 'active' : '' }}"
                                        href="{{ route('lokasi-list', ['type' => 'locket']) }}">
                                        Locket
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <a href="{{ route('lokasi-filter', ['type' => strtolower($selectedOption)]) }}"
                            class="btn btn-primary">
                            <i class="bx bx-filter"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Tabel -->
            <div class="card-datatable table-responsive text-nowrap">
                <table class="table table-striped border-bottom">
                    <thead class="bg-primary">
                        <tr>
                            <th><input type="checkbox" id="selectAll" class="form-check-input border-white"></th>
                            <th>ID {{ $selectedOption }}</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Koordinat</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @forelse ($lokasi as $item)
                            <tr>
                                <td>
                                    <input type="checkbox" class="form-check-input select-item"
                                        data-id="{{ strtolower($selectedOption) == 'hq' ? $item->hq_id : $item->locket_id }}">
                                </td>
                                <td>{{ strtolower($selectedOption) == 'hq' ? $item->hq_id : $item->locket_id }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->address }}</td>
                                <td>{{ $item->coordinate }}</td>
                                <td>
                                    <a href="{{ route('lokasi-detail', ['type' => strtolower($selectedOption), 'id' => $item->hq_id ?? $item->locket_id]) }}"
                                        class="btn btn-icon">
                                        <i class="fi fi-br-pencil"></i>
                                    </a>
                                    <form method="POST"
                                        action="{{ route('lokasi-destroy', ['type' => strtolower($selectedOption), 'id' => $item->hq_id ?? $item->locket_id]) }}"
                                        style="display: inline-block;"
                                        onsubmit="return confirm('Yakin ingin menghapus lokasi ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-icon delete-record">
                                            <i class="fi fi-br-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">Tidak ada data untuk ditampilkan.</td>
                            </tr>
                        @endforelse
                    </tbody>

                </table>
            </div>

            <!-- Pagination -->
            @if ($lokasi->hasPages())
                <div class="card-footer">
                    <nav class="d-flex justify-content-end">
                        {{ $lokasi->links('pagination::bootstrap-4') }}
                    </nav>
                </div>
            @endif
        </div>
    </div>
@endsection
