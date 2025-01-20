@php
    $container = 'container-fluid';
    $containerNav = 'container-fluid';
    $isNavbar = false;
@endphp

@extends('layouts/contentNavbarLayout')

@section('page-script')
    @vite('resources/assets/js/detail-account-order.js')
@endsection

@section('title', 'Detail Account - Orders')

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
                        <a class="nav-link active"
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
                </ul>

                <!-- Orders Content -->
                <div class="row">
                    <!-- Summary Cards -->
                    <div class="col-md-12 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="row text-center">
                                    <div class="col-md-4">
                                        <h3>Kupon</h3>
                                        <h2 class="fw-bold">10</h2>
                                    </div>
                                    <div class="col-md-4">
                                        <h3>Order</h3>
                                        <h2 class="fw-bold">29</h2>
                                    </div>
                                    <div class="col-md-4">
                                        <h3>Spend</h3>
                                        <h2 class="fw-bold">Rp 2,900,000</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- List Order Card -->
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">List Orders</h5>
                                <!-- Search Bar -->
                                <div class="row">
                                    <div class="col-md-12">
                                        <form class="d-flex">
                                            <div class="input-group">
                                                <span class="input-group-text">
                                                    <i class="bx bx-search"></i>
                                                </span>
                                                <input type="text" class="form-control" placeholder="Search orders...">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- Table -->
                            <div class="card-datatable table-responsive text-nowrap">
                                <table class="table border-bottom">
                                    <thead class="bg-primary">
                                        <tr>
                                            <th>ID</th>
                                            <th>Date</th>
                                            <th>Status</th>
                                            <th>Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orders as $order)
                                            <tr>
                                                <td>{{ $order['id'] }}</td>
                                                <td>{{ $order['date'] }}</td>
                                                <td>{{ $order['status'] }}</td>
                                                <td>Rp {{ number_format($order['price'], 0, ',', '.') }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <!-- Pagination -->
                            <div class="card-footer">
                                <nav>
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
