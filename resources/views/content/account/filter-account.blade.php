@php
    $container = 'container-fluid';
    $containerNav = 'container-fluid';
    $isNavbar = false;
@endphp

@extends('layouts/contentNavbarLayout')

@section('page-script')
    @vite('resources/assets/js/filter-account.js')
@endsection

@section('title', 'Filter Account')

@section('content')
    <div class="content">
        <x-judul title="Advanced Filter" />

        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-style1">
                <li class="breadcrumb-item">
                    <a href="{{ url('/') }}">Dashboard</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('account-list-account') }}">List Account</a>
                </li>
                <li class="breadcrumb-item active">Advanced Filter</li>
            </ol>
        </nav>
        <!--/ Breadcrumb -->

        <!-- Filter Form -->
        <div class="card">
            <div class="card-body">
                <form action="{{ route('filter-results-account') }}" method="GET">
                    <!-- Search Bar -->
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="bx bx-search"></i>
                                </span>
                                <input type="text" name="search" class="form-control"
                                    placeholder="Search by name, email, etc.">
                            </div>
                        </div>
                    </div>

                    <!-- Dropdowns for HQ and Loket -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="hq" class="form-label">HQ</label>
                            <select id="hq" name="hq" class="form-select">
                                <option value="" selected>Choose HQ</option>
                                <option value="hq1">HQ 1</option>
                                <option value="hq2">HQ 2</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="loket" class="form-label">Loket</label>
                            <select id="loket" name="loket" class="form-select">
                                <option value="" selected>Choose Loket</option>
                                <option value="loket1">Loket 1</option>
                                <option value="loket2">Loket 2</option>
                            </select>
                        </div>
                    </div>

                    <!-- Radio Buttons for New/Old -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Account Type</label>
                            <div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="type" value="new"
                                        id="new">
                                    <label class="form-check-label" for="new">New</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="type" value="old"
                                        id="old">
                                    <label class="form-check-label" for="old">Old</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Radio Buttons for Login/Logout -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Login Status</label>
                            <div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="login_status" value="login"
                                        id="login">
                                    <label class="form-check-label" for="login">Login</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="login_status" value="logout"
                                        id="logout">
                                    <label class="form-check-label" for="logout">Logout</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="row">
                        <div class="col-md-12 text-end">
                          <a href="{{ route('account-list-account') }}" class="btn btn-primary">Apply Filter</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
