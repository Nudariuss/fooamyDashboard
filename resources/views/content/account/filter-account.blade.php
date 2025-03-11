@php
    $container = 'container-fluid';
    $containerNav = 'container-fluid';
    $isNavbar = false;
@endphp

@extends('layouts/contentNavbarLayout')

@section('page-script')
    @vite('resources/assets/js/account.js')
@endsection

@section('title', 'Advanced Filter')

@section('content')
    <div class="content">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-style1">
                <li class="breadcrumb-item">
                    <a href="{{ url('/') }}">Dashboard</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('account-list', ['role' => $role]) }}">Akun</a>
                </li>
                <li class="breadcrumb-item active">Advanced Filter</li>
            </ol>
        </nav>

        <!-- Title -->
        <x-judul title="Advanced Filter" />

        <!-- Filter Form -->
        <div class="card">
            <div class="card-body">
                <form action="{{ route('account.filter-results') }}" method="GET">
                    <input type="hidden" name="role" value="{{ $role }}">

                    <!-- Search Bar -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="bx bx-search"></i>
                                </span>
                                <input type="text" name="search" class="form-control"
                                    placeholder="Search by name or email" value="{{ request('search') }}">
                            </div>
                        </div>
                    </div>

                    <!-- Filter for Role -->
                    <div class="row mb-3">
                        <div class="col-md-2">
                            <label for="filter-role" class="form-label">Filter by Role</label>
                            <select id="filter-role" name="filter_role" class="form-select">
                                <option value="">All Roles</option>
                                <option value="admin" {{ request('filter_role') == 'admin' ? 'selected' : '' }}>Admin
                                </option>
                                <option value="customer" {{ request('filter_role') == 'customer' ? 'selected' : '' }}>
                                    Customer</option>
                                <option value="management" {{ request('filter_role') == 'management' ? 'selected' : '' }}>
                                    Management</option>
                                <option value="mitra" {{ request('filter_role') == 'mitra' ? 'selected' : '' }}>Mitra
                                </option>
                                <option value="operational" {{ request('filter_role') == 'operational' ? 'selected' : '' }}>
                                    Operational</option>
                            </select>
                        </div>
                    </div>

                    <!-- Dropdowns for HQ and Loket -->
                    {{-- <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="hq" class="form-label">HQ</label>
                            <select id="hq" name="hq" class="form-select">
                                <option value="" selected>Choose HQ</option>
                                @foreach ($hqs as $hq)
                                    <option value="{{ $hq->hq_id }}"
                                        {{ request('hq') == $hq->hq_id ? 'selected' : '' }}>{{ $hq->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="loket" class="form-label">Loket</label>
                            <select id="loket" name="loket" class="form-select">
                                <option value="" selected>Choose Loket</option>
                                @foreach ($lokets as $loket)
                                    <option value="{{ $loket->locket_id }}"
                                        {{ request('loket') == $loket->locket_id ? 'selected' : '' }}>{{ $loket->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div> --}}

                    <!-- Radio Buttons for New/Old -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">User Order</label>
                            <div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="order" value="new"
                                        id="new" {{ request('order') == 'new' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="new">Newest</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="order" value="old"
                                        id="old" {{ request('order') == 'old' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="old">Oldest</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Radio Buttons for Account Status -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Account Status</label>
                            <div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status" value="active"
                                        id="active" {{ request('status') == 'active' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="active">Active</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status" value="inactive"
                                        id="inactive" {{ request('status') == 'inactive' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="inactive">Inactive</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="row">
                        <div class="col-md-12 text-end">
                            <button type="submit" class="btn btn-primary">Apply Filter</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
