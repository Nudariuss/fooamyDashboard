@php
    $container = 'container-fluid';
    $containerNav = 'container-fluid';
    $isNavbar = false;
@endphp

@extends('layouts/contentNavbarLayout')

@section('page-script')
    @vite('resources/assets/js/detail-account.js')
@endsection

@section('title', 'Detail Account - Overview')

@section('content')
    <div class="container-fluid">
        <x-judul title="Detail Account - Overview" />
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-style1">
                <li class="breadcrumb-item">
                    <a href="{{ url('/') }}">Dashboard</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('account-list-account', ['id' => $account['id'], 'role' => $role]) }}">Account</a>
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
                        <a class="nav-link active"
                            href="{{ route('account-detail-account', ['id' => $account['id'], 'role' => $role]) }}">
                            <i class="bx bx-user me-1"></i> Overview
                        </a>
                    </li>
                    @if (in_array($role, ['driver', 'hq', 'loket']))
                        <li class="nav-item me-2">
                            <a class="nav-link"
                                href="{{ route('account-detail-account-order', ['id' => $account['id'], 'role' => $role]) }}">
                                <i class="bx bx-cart me-1"></i> Order
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link"
                                href="{{ route('account-detail-account-operation', ['id' => $account['id'], 'role' => $role]) }}">
                                <i class="bx bx-cog me-1"></i> Operations
                            </a>
                        </li>
                    @else
                        <li class="nav-item me-2">
                            <a class="nav-link"
                                href="{{ route('account-detail-account-order', ['id' => $account['id'], 'role' => $role]) }}">
                                <i class="bx bx-cart me-1"></i> Order
                            </a>
                        </li>
                    @endif
                </ul>

                <!-- Overview Content -->
                <div class="row">
                    <!-- Address Book Card -->
                    <div class="col-md-12 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Address Book</h5>
                                <hr>
                                <div class="mb-3">
                                    <label for="addressType" class="form-label">Rumah</label>
                                    <select id="addressType" class="form-select">
                                        <option selected>Rumah</option>
                                        <option>Kantor</option>
                                    </select>
                                    <p class="mt-2">Jl. Contoh Alamat No. 123</p>
                                </div>
                                <hr>
                                <div>
                                    <label for="addressType2" class="form-label">Kantor</label>
                                    <select id="addressType2" class="form-select">
                                        <option selected>Kantor</option>
                                        <option>Rumah</option>
                                    </select>
                                    <p class="mt-2">Jl. Kantor Contoh No. 456</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Recent Login Card -->
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Recent Login</h5>
                                <hr>
                                <div style="max-height: 200px; overflow-y: auto;">
                                    <!-- Recent Login Item -->
                                    <ul class="list-group">
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <div>
                                                <p class="mb-0 text-dark">Buah Batu</p>
                                                <p class="mb-0 text-dark">Smartphone</p>
                                                <p class="mb-0 text-dark">20-01-24</p>
                                            </div>
                                            <div class="text-end">
                                                <p class="fw-bold fs-5 text-dark mb-0">11:45</p>
                                            </div>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <div>
                                                <p class="mb-0 text-dark">Dago Atas</p>
                                                <p class="mb-0 text-dark">Tablet</p>
                                                <p class="mb-0 text-dark">19-01-24</p>
                                            </div>
                                            <div class="text-end">
                                                <p class="fw-bold fs-5 text-dark mb-0">10:30</p>
                                            </div>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <div>
                                                <p class="mb-0 text-dark">Jakarta Selatan</p>
                                                <p class="mb-0 text-dark">PC</p>
                                                <p class="mb-0 text-dark">18-01-24</p>
                                            </div>
                                            <div class="text-end">
                                                <p class="fw-bold fs-5 text-dark mb-0">09:00</p>
                                            </div>
                                        </li>
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
                </div>
            </div>
        </div>
    </div>
@endsection
