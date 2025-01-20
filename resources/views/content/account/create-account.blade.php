@php
    $container = 'container-fluid';
    $containerNav = 'container-fluid';
    $isNavbar = false;
@endphp

@extends('layouts/contentNavbarLayout')

@section('page-script')
    @vite('resources/assets/js/create-account.js')
@endsection

@section('title', 'Create Account')

@section('content')
    <div class="container-fluid">
        <x-judul title="Create New Account" />

        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-style1">
                <li class="breadcrumb-item">
                    <a href="{{ url('/') }}">Dashboard</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('account-list-account') }}">Account</a>
                </li>
                <li class="breadcrumb-item active">
                  <a href="{{ route('account-create-account') }}">Create Account</a>
                </li>
            </ol>
        </nav>
        <!--/ Breadcrumb -->

        <!-- Form for Creating Account -->
        <div class="card">
            <div class="card-body">
                <form method="GET">
                    @csrf
                    <!-- Role -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="role" class="form-label">Role</label>
                            <select id="role" name="role" class="form-select">
                                <option value="user">User</option>
                                <option value="hq">HQ</option>
                                <option value="loket">Loket</option>
                                <option value="driver">Driver</option>
                                <option value="management">Management</option>
                                <option value="mitra">Mitra</option>
                            </select>
                        </div>
                    </div>

                    <!-- User Details -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="name" class="form-label">Full Name</label>
                            <input type="text" id="name" name="name" class="form-control"
                                placeholder="Enter full name">
                        </div>
                        <div class="col-md-6">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" id="username" name="username" class="form-control"
                                placeholder="Enter username">
                        </div>
                    </div>

                    <!-- Password -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" id="password" name="password" class="form-control"
                                placeholder="Enter password">
                        </div>
                    </div>

                    <!-- Email and Contact -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="email" class="form-label">Email <i class="fi fi-br-envelope"></i></label>
                            <input type="email" id="email" name="email" class="form-control"
                                placeholder="Enter Email">
                        </div>
                        <div class="col-md-6">
                            <label for="contact" class="form-label">Contact <i class="fi fi-br-phone-flip"></i></label>
                            <input type="text" id="contact" name="contact" class="form-control"
                                placeholder="Enter contact number">
                        </div>
                    </div>

                    <!-- Status Dropdown -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="status" class="form-label">Status</label>
                            <select id="status" name="status" class="form-select">
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>
                    </div>

                    <!-- HQ and Loket -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="hq" class="form-label">HQ <i class="fi fi-br-marker"></i></label>
                            <textarea id="hq" name="hq" rows="3" class="form-control" placeholder="Enter HQ details"></textarea>
                        </div>
                        <div class="col-md-6">
                            <label for="loket" class="form-label">Loket <i class="fi fi-br-marker"></i></label>
                            <textarea id="loket" name="loket" rows="3" class="form-control" placeholder="Enter Loket details"></textarea>
                        </div>
                    </div>

                    <!-- Save Button -->
                    <div class="row">
                        <div class="col text-end">
                            <a href="{{ route('account-list-account') }}" class="btn btn-primary">
                                <i class="bx bx-save"></i> Save
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
