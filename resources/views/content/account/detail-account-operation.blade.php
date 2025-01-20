@php
    $container = 'container-fluid';
    $containerNav = 'container-fluid';
    $isNavbar = false;
@endphp

@extends('layouts/contentNavbarLayout')

@section('page-script')
    @vite('resources/assets/js/detail-account-operation.js')
@endsection

@section('title', 'Detail Account - Operations')

@section('content')
    <div class="container-fluid">
        <x-judul title="Detail Account - Order" />
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-style1">
                <li class="breadcrumb-item">
                    <a href="{{ url('/') }}">Dashboard</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="javascript:void(0);">Account</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="javascript:void(0);">Detail Account</a>
                </li>
                <li class="breadcrumb-item active">
                    <a href="{{ route('account-detail-account', ['id' => $account['id'], 'role' => $role]) }}">
                        {{ ucfirst($role) }}
                    </a>
                </li>
            </ol>
        </nav>
        <div class="row">
            <!-- Sidebar Profile -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body text-center">
                        <!-- Profile Image -->
                        <img src="{{ asset('assets/img/avatars/Fo.png') }}" alt="User Avatar" class="rounded-circle mb-3"
                            width="150" height="150" style="object-fit: cover;">
                        <h4 class="card-title">{{ $account['name'] }}</h4>
                        <p class="text-muted">{{ $account['email'] }}</p>
                        <hr>
                        <div class="text-start">
                            @if ($role === 'driver' || $role === 'hq')
                                <p><strong>HQ:</strong> {{ $account['hq'] }}</p>
                            @endif
                            <p><strong>Role:</strong> {{ ucfirst($role) }}</p>
                        </div>
                        <button class="btn btn-primary w-100 mb-3">Edit</button>

                        <!-- Dropdown Status -->
                        <select class="form-select" aria-label="Account Status">
                            <option value="active" selected>Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <div class="col-md-8">
                <!-- Navigation Buttons -->
                <ul class="nav nav-pills mb-4">
                    <li class="nav-item me-2">
                        <a class="nav-link"
                            href="{{ route('account-detail-account', ['id' => $account['id'], 'role' => $role]) }}">
                            <i class="bx bx-user me-1"></i> Overview
                        </a>
                    </li>
                    <li class="nav-item me-2">
                        <a class="nav-link"
                            href="{{ route('account-detail-account-order', ['id' => $account['id'], 'role' => $role]) }}">
                            <i class="bx bx-cart me-1"></i> Order
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active"
                            href="{{ route('account-detail-account-operation', ['id' => $account['id'], 'role' => $role]) }}">
                            <i class="bx bx-cog me-1"></i> Operations
                        </a>
                    </li>
                </ul>

                <!-- Operations Content -->
                <div class="row">
                    <!-- Status Operasional Card -->
                    <div class="col-md-12 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Status Operasional</h5>
                                <select class="form-select mb-3">
                                    <option value="active" selected>Active</option>
                                    <option value="inactive">Inactive</option>
                                    <option value="suspended">Suspended</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Plat Card -->
                    @if ($role === 'driver')
                        <!-- Plat Card -->
                        <div class="col-md-12 mb-4">
                            <div class="card">
                                <div class="card-body d-flex justify-content-between align-items-center">
                                    <h5 class="card-title mb-0">Plat</h5>
                                    <div class="d-flex align-items-center">
                                        <h4 class="mb-0 me-5"><strong>{{ $account['plat'] ?? 'N/A' }}</strong></h4>
                                        <a href="{{ route('account-detail-account', ['id' => $account['id'], 'role' => $role]) }}"
                                            class="btn btn-icon">
                                            <i class="fi fi-br-pencil"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Status Driver Card -->
                        <div class="col-md-12 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Status Driver</h5>
                                    <hr>
                                    <div style="max-height: 200px; overflow-y: auto;">
                                        <ul class="list-group">
                                            @foreach ($driverStatuses as $status)
                                                <li
                                                    class="list-group-item d-flex justify-content-between align-items-center">
                                                    <div>
                                                        <p class="mb-0 text-dark">{{ $status['status_driver'] }}</p>
                                                        <p class="mb-0 text-dark">{{ $status['date'] }}</p>
                                                    </div>
                                                    <div class="text-end">
                                                        <p class="fw-bold fs-5 text-dark mb-0">{{ $status['time'] }}</p>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <!-- Pagination -->
                                    <nav class="mt-3">
                                        <ul class="pagination justify-content-end mb-0">
                                            <li class="page-item disabled">
                                                <a class="page-link" href="#"><i class="bx bx-chevron-left"></i></a>
                                            </li>
                                            <li class="page-item active">
                                                <a class="page-link" href="#">1</a>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link" href="#">2</a>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link" href="#">3</a>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link" href="#"><i class="bx bx-chevron-right"></i></a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    @elseif (in_array($role, ['hq', 'loket']))
                        <!-- Recent Login Card -->
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title">Recent Login</h5>
                                    <hr>
                                    <div style="max-height: 200px; overflow-y: auto;">
                                        <ul class="list-group">
                                            @foreach ($driverStatuses as $status)
                                                <li
                                                    class="list-group-item d-flex justify-content-between align-items-center">
                                                    <div>
                                                        <p class="mb-0 text-dark">{{ $status['status_driver'] }}</p>
                                                        <p class="mb-0 text-dark">{{ $status['date'] }}</p>
                                                    </div>
                                                    <div class="text-end">
                                                        <p class="fw-bold fs-5 text-dark mb-0">{{ $status['time'] }}</p>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <!-- Pagination -->
                                    <nav class="mt-3">
                                        <ul class="pagination justify-content-end mb-0">
                                            <li class="page-item disabled">
                                                <a class="page-link" href="#"><i
                                                        class="bx bx-chevron-left"></i></a>
                                            </li>
                                            <li class="page-item active">
                                                <a class="page-link" href="#">1</a>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link" href="#">2</a>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link" href="#">3</a>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link" href="#"><i
                                                        class="bx bx-chevron-right"></i></a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
