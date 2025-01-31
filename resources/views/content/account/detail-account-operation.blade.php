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
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-style1">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('account-list', ['role' => $role]) }}">Account</a></li>
                <li class="breadcrumb-item active">{{ ucfirst($role) }} - Operations</li>
            </ol>
        </nav>
        <x-judul title="Detail Account - Operations" />
        <div class="row">
            <!-- Sidebar Profile -->
            <div class="col-md-4">
                @include('partials.account-sidebar', ['account' => $account, 'role' => $role])
            </div>

            <!-- Main Content -->
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Status Operational</h5>
                        <form method="POST" action="{{ route('account-update-status', $account->id) }}">
                            @csrf
                            <select name="status" class="form-select mb-3">
                                <option value="active"
                                    {{ $account->userMobile?->staff?->operational_status === 'active' ? 'selected' : '' }}>
                                    Active</option>
                                <option value="inactive"
                                    {{ $account->userMobile?->staff?->operational_status === 'inactive' ? 'selected' : '' }}>
                                    Inactive</option>
                            </select>
                            <button type="submit" class="btn btn-primary w-100">Update Status</button>
                        </form>
                    </div>
                </div>

                <div class="card mt-4">
                    <div class="card-body">
                        <h5 class="card-title">Driver Status</h5>
                        <ul class="list-group">
                            @foreach ($driverStatuses as $status)
                                <li class="list-group-item d-flex justify-content-between">
                                    <div>
                                        <p>{{ $status->driver_status }}</p>
                                        <small>{{ $status->created_at->format('Y-m-d H:i') }}</small>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                        <nav class="mt-3">
                            <ul class="pagination justify-content-end">
                                {{ $driverStatuses->links('vendor.pagination.bootstrap-4') }}
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
