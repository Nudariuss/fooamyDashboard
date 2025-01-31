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
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-style1">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('account-list', ['role' => strtolower($role)]) }}">Account</a>
                </li>
                <li class="breadcrumb-item"><a
                        href="{{ route('account-list', ['role' => strtolower($role)]) }}">{{ ucfirst($role) }}</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0);">{{ $account->user_id }}</a></li>
                <li class="breadcrumb-item active">Order</li>
            </ol>
        </nav>
        <x-judul title="Detail Account - Order" />
        <div class="row">
            <!-- Sidebar Profile -->
            <div class="col-md-4">
                @include('partials.account-sidebar', ['account' => $account, 'role' => $role])
            </div>

            <!-- Main Content -->
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Orders Summary</h5>
                        <div class="row text-center">
                            <div class="col-md-4">
                                <h3>Kupon</h3>
                                <h2 class="fw-bold">{{ $orderSummary['coupons'] ?? 0 }}</h2>
                            </div>
                            <div class="col-md-4">
                                <h3>Orders</h3>
                                <h2 class="fw-bold">{{ $orderSummary['orders'] ?? 0 }}</h2>
                            </div>
                            <div class="col-md-4">
                                <h3>Spend</h3>
                                <h2 class="fw-bold">Rp {{ number_format($orderSummary['spend'], 0, ',', '.') }}</h2>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Order List -->
                <div class="card mt-4">
                    <div class="card-header d-flex justify-content-between">
                        <h5 class="card-title">List Orders</h5>
                        <form class="d-flex">
                            <div class="input-group">
                                <span class="input-group-text"><i class="bx bx-search"></i></span>
                                <input type="text" class="form-control" placeholder="Search orders...">
                            </div>
                        </form>
                    </div>
                    <div class="card-datatable table-responsive">
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
                                        <td>{{ $order->id }}</td>
                                        <td>{{ $order->created_at->format('Y-m-d') }}</td>
                                        <td>{{ $order->status }}</td>
                                        <td>Rp {{ number_format($order->price, 0, ',', '.') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="card-footer">
                        <nav>
                            <ul class="pagination justify-content-end">
                                {{ $orders->links('vendor.pagination.bootstrap-4') }}
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
