@php
    $container = 'container-fluid';
    $containerNav = 'container-fluid';
    $isNavbar = false;
@endphp

@extends('layouts/contentNavbarLayout')

@section('title', 'Detail Account - Overview')

@section('content')
    <div class="container-fluid">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-style1">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('account-list', ['role' => strtolower($role)]) }}">Account</a>
                </li>
                <li class="breadcrumb-item"><a
                        href="{{ route('account-list', ['role' => strtolower($role)]) }}">{{ ucfirst($role) }}</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0);">{{ $account->user_id }}</a></li>
                <li class="breadcrumb-item active">Overview</li>
            </ol>
        </nav>

        <!-- Title -->
        <x-judul title="Detail Account - Overview" />

        <div class="row">
            <!-- Sidebar Profile -->
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-header text-center pb-0">
                        <img src="{{ asset('assets/img/avatars/Fo.png') }}" alt="User Avatar" class="rounded-circle mb-3"
                            width="150" height="150" style="object-fit: cover;">
                        <h4 class="card-title">{{ $account->name }}</h4>
                        <p class="text-muted">{{ $account->userWeb->email ?? '-' }}</p>
                        <hr>
                    </div>
                    <div class="card-body pt-2 pb-2">
                        <div class="text-start">
                            <p><strong>Contact:</strong> {{ $account->userMobile->phone_number ?? '-' }}</p>
                            <p><strong>Role:</strong> {{ ucfirst($role) }}</p>
                            @if ($role === 'operational')
                                <p><strong>Driver Plate:</strong> {{ $account->userMobile->staff->driver_plate ?? '-' }}
                                </p>
                                <p><strong>Driver Status:</strong> {{ $account->userMobile->staff->driver_status ?? '-' }}
                                </p>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('account-update-status', $account->user_id) }}">
                            @csrf
                            <select name="status" class="form-select mb-3">
                                <option value="active"
                                    {{ $account->userMobile?->is_active || $account->userWeb?->is_active ? 'selected' : '' }}>
                                    Active</option>
                                <option value="inactive"
                                    {{ !$account->userMobile?->is_active && !$account->userWeb?->is_active ? 'selected' : '' }}>
                                    Inactive</option>
                            </select>
                            <button type="submit" class="btn btn-primary w-100">Update Status</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <div class="col-md-8">
                <ul class="nav nav-pills mb-4">
                    <li class="nav-item me-2">
                        <a class="nav-link {{ Route::is('account-detail-overview') ? 'active' : '' }}"
                            href="{{ route('account-detail-overview', ['id' => $account->user_id, 'role' => $role]) }}">
                            <i class="bx bx-user me-1"></i> Overview
                        </a>
                    </li>
                    <li class="nav-item me-2">
                        <a class="nav-link {{ Route::is('account-detail-order') ? 'active' : '' }}"
                            href="{{ route('account-detail-order', ['id' => $account->user_id, 'role' => $role]) }}">
                            <i class="bx bx-cart me-1"></i> Order
                        </a>
                    </li>
                    @if ($role === 'operational')
                        <li class="nav-item">
                            <a class="nav-link {{ Route::is('account-detail-operation') ? 'active' : '' }}"
                                href="{{ route('account-detail-operation', ['id' => $account->user_id, 'role' => $role]) }}">
                                <i class="bx bx-cog me-1"></i> Operations
                            </a>
                        </li>
                    @endif
                </ul>

                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Address Book</h5>
                        <hr>
                        <p><strong>Rumah:</strong> Jl. Contoh Alamat No. 123</p>
                        <p><strong>Kantor:</strong> Jl. Kantor Contoh No. 456</p>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Recent Login</h5>
                        <hr>
                        <div style="max-height: 400px; overflow-y: auto;">
                            <ul class="list-group">
                                @foreach ($loginHistory as $login)
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <div>
                                            <p class="mb-0 text-dark">{{ $login->device }}</p>
                                            <p class="mb-0 text-dark">{{ $login->location }}</p>
                                            <p class="mb-0 text-dark">{{ $login->activity_date->format('Y-m-d H:i:s') }}</p>
                                        </div>
                                        <div class="text-end">
                                            <p class="fw-bold fs-5 text-dark mb-0">
                                                {{ $login->activity_date->format('H:i') }}</p>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                            <nav class="mt-3">
                                <ul class="pagination justify-content-end mb-0">
                                    {{ $loginHistory->links('vendor.pagination.bootstrap-4') }}
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
