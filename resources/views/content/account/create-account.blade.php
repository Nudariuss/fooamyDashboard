@php
    $container = 'container-fluid';
    $containerNav = 'container-fluid';
    $isNavbar = false;
@endphp

@extends('layouts/contentNavbarLayout')

@section('page-script')
    @vite('resources/assets/js/account.js')
@endsection

@section('title', 'Tambah Akun')

@section('content')
    <div class="container-fluid">

        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-style1">
                <li class="breadcrumb-item">
                    <a href="{{ url('/') }}">Dashboard</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('account-list', ['role' => strtolower($role)]) }}">Akun</a>
                </li>
                <li class="breadcrumb-item active">
                    Tambah Akun
                </li>
            </ol>
        </nav>
        <x-judul title="Tambah Akun" />

        <!-- Form for Creating Account -->
        <div class="card">
            <div class="card-body">
                <form method="POST" action="{{ route('account-store') }}">
                    @csrf

                    <!-- Role Selection -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="role" class="form-label">Role</label>
                            <select id="role" name="role" class="form-select" required>
                                <option value="admin" {{ $role === 'admin' ? 'selected' : '' }}>Admin</option>
                                <option value="customer" {{ $role === 'customer' ? 'selected' : '' }}>Customer</option>
                                <option value="management" {{ $role === 'management' ? 'selected' : '' }}>Management
                                </option>
                                <option value="mitra" {{ $role === 'mitra' ? 'selected' : '' }}>Mitra</option>
                                <option value="operational" {{ $role === 'operational' ? 'selected' : '' }}>Operational
                                </option>
                            </select>
                        </div>
                    </div>

                    <!-- Common Fields -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="name" class="form-label">Full Name</label>
                            <input type="text" id="name" name="name" class="form-control"
                                placeholder="Enter full name" required>
                        </div>
                        <div class="col-md-6">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" id="password" name="password" class="form-control"
                                placeholder="Enter password" required>
                        </div>
                    </div>

                    <!-- Role-Specific Fields -->
                    <div class="row mb-3">
                        <!-- For Roles with Email -->
                        <div class="col-md-6" id="emailField">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" id="email" name="email" class="form-control"
                                placeholder="Enter email">
                        </div>

                        <!-- For Roles with Contact -->
                        <div class="col-md-6" id="contactField">
                            <label for="contact" class="form-label">Contact</label>
                            <input type="text" id="contact" name="contact" class="form-control"
                                placeholder="Enter contact number">
                        </div>
                    </div>

                    <!-- Operational-Specific Fields -->
                    <div class="row mb-3" id="operationalFields" style="display: none;">
                        <div class="col-md-6">
                            <label for="driver_plate" class="form-label">Driver Plate</label>
                            <input type="text" id="driver_plate" name="driver_plate" class="form-control"
                                placeholder="Enter driver plate">
                        </div>
                        <div class="col-md-6">
                            <label for="driver_status" class="form-label">Driver Status</label>
                            <select name="driver_status" class="form-select">
                                <option value="Standby">Standby</option>
                                <option value="Pickup">Pickup</option>
                                <option value="Delivery">Delivery</option>
                                <option value="Offline">Offline</option>
                            </select>

                        </div>
                    </div>

                    <!-- Status -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="status" class="form-label">Status</label>
                            <select id="status" name="status" class="form-select">
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>
                    </div>

                    <!-- Save Button -->
                    <div class="text-end">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
