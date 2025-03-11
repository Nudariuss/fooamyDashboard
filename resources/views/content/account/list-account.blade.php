@php
    $container = 'container-fluid';
    $containerNav = 'container-fluid';
    $isNavbar = false;
@endphp

@extends('layouts/contentNavbarLayout')

@section('page-script')
    @vite('resources/assets/js/account.js')
@endsection

@section('title', 'List Akun')

@section('content')
    <div class="container-fluid">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-style1">
                <li class="breadcrumb-item">
                    <a href="{{ url('/') }}">Dashboard</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('account-list', ['role' => strtolower($role)]) }}">Akun</a>
                </li>
                <li class="breadcrumb-item active">
                    {{ $roleDisplay }}
                </li>
            </ol>
        </nav>
        <x-judul title="List Akun {{ $roleDisplay ?? 'Customer' }}" />
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <form method="GET" action="{{ route('account-list', ['role' => 'all']) }}" class="d-flex">
                            <div class="input-group input-group-merge short-searchbar">
                                <span class="input-group-text" id="basic-addon-search"><i class="bx bx-search"></i></span>
                                <input type="text" class="form-control" name="search" placeholder="Cari akun"
                                    value="{{ request('search') }}" aria-label="Cari akun" />
                            </div>
                        </form>
                    </div>

                    <div class="col-md-6 d-flex justify-content-end align-items-center">
                        <a href="{{ route('account-create', ['role' => strtolower($role)]) }}" class="btn btn-primary me-2">
                            <i class="bx bx-plus"></i>
                        </a>

                        <div class="btn-group me-2">
                            <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                {{ $roleDisplay }}
                            </button>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item {{ $role === 'admin' ? 'active' : '' }}"
                                        href="{{ route('account-list', ['role' => 'admin']) }}">
                                        Admin
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item {{ $role === 'customer' ? 'active' : '' }}"
                                        href="{{ route('account-list', ['role' => 'customer']) }}">
                                        Customer
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item {{ $role === 'management' ? 'active' : '' }}"
                                        href="{{ route('account-list', ['role' => 'management']) }}">
                                        Management
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item {{ $role === 'mitra' ? 'active' : '' }}"
                                        href="{{ route('account-list', ['role' => 'mitra']) }}">
                                        Mitra
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item {{ $role === 'operational' ? 'active' : '' }}"
                                        href="{{ route('account-list', ['role' => 'operational']) }}">
                                        Operational
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <a href="{{ route('account-filter') }}" class="btn btn-primary">
                            <i class="bx bx-filter"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-datatable table-responsive text-nowrap">
                <table class="table table-striped border-bottom">
                    <thead class="bg-primary">
                        <tr>
                            <!-- Checkbox -->
                            <th>
                                <input type="checkbox" id="selectAll" class="form-check-input border-white">
                            </th>
                            <!-- Nama -->
                            <th>Nama</th>

                            <!-- Kolom Berdasarkan Role -->
                            @if ($role === 'admin')
                                <th>Email</th>
                            @elseif ($role === 'customer')
                                <th>Nomor HP</th>
                                <th>Gender</th>
                                <th>Status</th>
                            @elseif ($role === 'management')
                                <th>Email</th>
                                <th>Status</th>
                            @elseif ($role === 'mitra')
                                <th>Email</th>
                                <th>Status</th>
                            @elseif ($role === 'operational')
                                <th>Nomor HP</th>
                                <th>Plat Nomor</th>
                                <th>Nomor HP</th>
                                <th>Status Operational</th>
                            @endif

                            <th>Tanggal Buat</th>

                            <!-- Actions -->
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @if ($accounts->isEmpty())
                            <tr>
                                <td colspan="5" class="text-center text-muted">Akun tidak terdaftar</td>
                            </tr>
                        @else
                            @foreach ($accounts as $account)
                                <tr>
                                    <!-- Checkbox -->
                                    <td>
                                        <input type="checkbox" class="form-check-input select-item"
                                            data-id="{{ $account->user_id }}">
                                    </td>

                                    <!-- Nama -->
                                    <td>{{ $account->name }}</td>

                                    <!-- Kolom Berdasarkan Role -->
                                    @if ($role === 'admin')
                                        <td>{{ $account->userWeb->email ?? '-' }}</td>
                                    @elseif ($role === 'customer')
                                        <td>{{ $account->userMobile->phone_number ?? '-' }}</td>
                                        <td>{{ $account->userMobile->gender ?? '-' }}</td>
                                        <td>
                                            <span
                                                class="badge {{ $account->userMobile->is_active ? 'bg-success' : 'bg-secondary' }}">
                                                {{ $account->userMobile->is_active ? 'Active' : 'Inactive' }}
                                            </span>
                                        </td>
                                    @elseif ($role === 'management')
                                        <td>{{ $account->userWeb->email ?? '-' }}</td>
                                        <td>
                                            <span
                                                class="badge {{ $account->userWeb->is_active ? 'bg-success' : 'bg-secondary' }}">
                                                {{ $account->userWeb->is_active ? 'Active' : 'Inactive' }}
                                            </span>
                                        </td>
                                    @elseif ($role === 'mitra')
                                        <td>{{ $account->userWeb->email ?? '-' }}</td>
                                        <td>
                                            <span
                                                class="badge {{ $account->userWeb->is_active ? 'bg-success' : 'bg-secondary' }}">
                                                {{ $account->userWeb->is_active ? 'Active' : 'Inactive' }}
                                            </span>
                                        </td>
                                    @elseif ($role === 'operational')
                                        <td>{{ $account->userMobile->phone_number ?? '-' }}</td>
                                        <td>{{ $account->userMobile->staff->driver_plate ?? '-' }}</td>
                                        <td>{{ $account->userMobile->staff->driver_status ?? '-' }}</td>
                                        <td>
                                            <span
                                                class="badge {{ $account->userMobile->staff->operational_status ? 'bg-success' : 'bg-secondary' }}">
                                                {{ $account->userMobile->staff->operational_status ? 'Active' : 'Inactive' }}
                                            </span>
                                        </td>
                                    @endif

                                    <td>{{ $account->created_at }}</td>

                                    <!-- Actions -->
                                    <td>
                                        <a href="{{ route('account-detail-overview', ['id' => $account->user_id, 'role' => $role]) }}"
                                            class="btn btn-icon">
                                            <i class="fi fi-br-pencil"></i>
                                        </a>
                                        <form action="{{ route('account-delete', ['id' => $account->user_id]) }}"
                                            method="POST" class="d-inline delete-form">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-icon delete-record">
                                                <i class="fi fi-br-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>

            @if ($accounts->hasPages())
                <div class="card-footer">
                    <!-- Pagination -->
                    <nav aria-label="Page navigation">
                        <ul class="pagination justify-content-end mb-0">
                            {{ $accounts->links('vendor.pagination.bootstrap-4') }}
                        </ul>
                    </nav>
            @endif
        </div>
    </div>
    </div>
@endsection
