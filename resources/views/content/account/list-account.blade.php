@php
    $container = 'container-fluid';
    $containerNav = 'container-fluid';
    $isNavbar = false;
@endphp

@extends('layouts/contentNavbarLayout')

@section('page-script')
    @vite('resources/assets/js/list-account.js')
@endsection

@section('title', 'Account List')

@section('content')
    <div class="container-fluid">
        <x-judul title="List Account" />
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-style1">
                <li class="breadcrumb-item">
                    <a href="{{ url('/') }}">Dashboard</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="javascript:void(0);">Account</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('account-list-account') }}">List Account</a>
                </li>
                <li class="breadcrumb-item active">
                    {{ $roleDisplay }}
                </li>
            </ol>
        </nav>
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <form class="d-flex align-items-center">
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon1">
                                    <i class="bx bx-search"></i>
                                </span>
                                <input type="text" class="form-control" placeholder="Search" aria-label="Search"
                                    aria-describedby="basic-addon1">
                            </div>
                        </form>
                    </div>

                    <div class="col-md-6 d-flex justify-content-end align-items-center">
                        <a href="{{ route('account-create-account') }}" class="btn btn-primary me-2">
                            <i class="bx bx-plus"></i>
                        </a>

                        <div class="btn-group me-2">
                            <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                {{ $roleDisplay }}
                            </button>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item {{ $role === 'driver' ? 'active' : '' }}"
                                        href="{{ route('list-account', ['role' => 'driver']) }}">
                                        Driver
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item {{ $role === 'customer' ? 'active' : '' }}"
                                        href="{{ route('list-account', ['role' => 'customer']) }}">
                                        Customer
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item {{ $role === 'hq' ? 'active' : '' }}"
                                        href="{{ route('list-account', ['role' => 'hq']) }}">
                                        HQ
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item {{ $role === 'loket' ? 'active' : '' }}"
                                        href="{{ route('list-account', ['role' => 'loket']) }}">
                                        Loket
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item {{ $role === 'management' ? 'active' : '' }}"
                                        href="{{ route('list-account', ['role' => 'management']) }}">
                                        Management
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item {{ $role === 'mitra' ? 'active' : '' }}"
                                        href="{{ route('list-account', ['role' => 'mitra']) }}">
                                        Mitra
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <a href="{{ route('account-filter-account') }}" class="btn btn-primary">
                            <i class="bx bx-filter"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-datatable table-responsive text-nowrap">
                <table class="table border-bottom">
                    <thead class="bg-primary">
                        <tr>
                            <th>
                                <input type="checkbox" id="selectAll" class="form-check-input border-white">
                            </th>
                            <th>Nama</th>
                            <th>Email</th>
                            @if ($role === 'driver')
                                <th>Lokasi HQ</th>
                                <th>Plat Nomor</th>
                                <th>Status</th>
                                <th>Active</th>
                            @elseif ($role === 'hq')
                                <th>Lokasi HQ</th>
                                <th>Online</th>
                                <th>Active</th>
                            @elseif ($role === 'loket')
                                <th>Lokasi HQ</th>
                                <th>Lokasi Loket</th>
                                <th>Online</th>
                                <th>Active</th>
                            @elseif ($role === 'management' || $role === 'customer')
                                <th>Status</th>
                            @elseif ($role === 'mitra')
                                <th>Nama Perusahaan</th>
                                <th>Nama PIC</th>
                                <th>Status</th>
                            @endif
                            <th>Actions</th> <!-- Tambahkan kolom Action -->
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($accounts as $index => $account)
                            <tr>
                                <td>
                                    <input type="checkbox" class="form-check-input select-item"
                                        data-id="{{ $index + 1 }}">
                                </td>
                                <td>{{ $account['name'] ?? $account['nama_perusahaan'] }}</td>
                                <td>{{ $account['email'] }}</td>
                                @if ($role === 'driver')
                                    <td>{{ $account['hq'] }}</td>
                                    <td>{{ $account['plat'] }}</td>
                                    <td>
                                        <span class="badge bg-info">{{ $account['status'] }}</span>
                                    </td>
                                    <td>
                                        <span
                                            class="badge {{ $account['active'] === 'Active' ? 'bg-success' : 'bg-secondary' }}">
                                            {{ $account['active'] }}
                                        </span>
                                    </td>
                                @elseif ($role === 'hq')
                                    <td>{{ $account['lokasi_hq'] }}</td>
                                    <td>
                                        <span class="badge {{ $account['online'] ? 'bg-success' : 'bg-secondary' }}">
                                            {{ $account['online'] ? 'Online' : 'Offline' }}
                                        </span>
                                    </td>
                                    <td>
                                        <span class="badge {{ $account['active'] ? 'bg-success' : 'bg-secondary' }}">
                                            {{ $account['active'] ? 'Active' : 'Inactive' }}
                                        </span>
                                    </td>
                                @elseif ($role === 'loket')
                                    <td>{{ $account['lokasi_hq'] }}</td>
                                    <td>{{ $account['lokasi_loket'] }}</td>
                                    <td>
                                        <span class="badge {{ $account['online'] ? 'bg-success' : 'bg-secondary' }}">
                                            {{ $account['online'] ? 'Online' : 'Offline' }}
                                        </span>
                                    </td>
                                    <td>
                                        <span class="badge {{ $account['active'] ? 'bg-success' : 'bg-secondary' }}">
                                            {{ $account['active'] ? 'Active' : 'Inactive' }}
                                        </span>
                                    </td>
                                @elseif ($role === 'management' || $role === 'customer')
                                    <td>{{ $account['status'] }}</td>
                                @elseif ($role === 'mitra')
                                    <td>{{ $account['nama_pic'] }}</td>
                                    <td>{{ $account['status'] }}</td>
                                @endif
                                <td>
                                    <!-- Tombol Action -->
                                    <a href="{{ route('account-detail-account', ['id' => $account['id'], 'role' => $role]) }}"
                                        class="btn btn-icon">
                                        <i class="fi fi-br-pencil"></i>
                                    </a>

                                    <a href="javascript:void(0);" class="btn btn-icon delete-record">
                                        <i class="fi fi-br-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
