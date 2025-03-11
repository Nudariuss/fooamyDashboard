@php
$container = 'container-fluid';
$containerNav = 'container-fluid';
$isNavbar = false;
@endphp

@extends('layouts/contentNavbarLayout')

@section('page-script')
@vite('resources/assets/js/filter-laporan.js')
@endsection

@section('title', 'Filter Laporan')

@section('content')
<div class="content">
  <x-judul title="Filter Laporan {{ ucfirst($type) }}" />

  <!-- Breadcrumb -->
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb breadcrumb-style1">
      <li class="breadcrumb-item">
        <a href="{{ url('/') }}">Dashboard</a>
      </li>
      <li class="breadcrumb-item">
        <a href="javascript:void(0);">Laporan Keuangan</a>
      </li>
      <li class="breadcrumb-item">
        <a href="{{ route('laporan-keuangan-' . $type) }}">{{ ucfirst($type) }}</a>
      </li>
      <li class="breadcrumb-item active">Filter Laporan</li>
    </ol>
  </nav>
  <!--/ Breadcrumb -->

  <!-- Filter Form -->
  <div class="card">
    <div class="card-body">
      <form action="{{ route('laporan-filter-results') }}" method="GET">
        <input type="hidden" name="type" value="{{ $type }}">
        <!-- Search Bar -->
        <div class="row mb-3">
          <div class="col-md-12">
            <div class="input-group">
              <span class="input-group-text">
                <i class="bx bx-search"></i>
              </span>
              <input type="text" name="search" class="form-control" placeholder="Search by name, category, etc.">
            </div>
          </div>
        </div>

        <!-- Dropdowns for Filters -->
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

        <!-- Checkbox Filters -->
        <div class="row mb-3">
          <div class="col-md-6">
            <label class="form-label">Type</label>
            <div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" name="type[]" value="satuan" id="satuan">
                <label class="form-check-label" for="satuan">Satuan</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" name="type[]" value="kiloan" id="kiloan">
                <label class="form-check-label" for="kiloan">Kiloan</label>
              </div>
            </div>
          </div>
        </div>

        <!-- Radio Buttons -->
        <div class="row mb-3">
          <div class="col-md-6">
            <label class="form-label">Filter by</label>
            <div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="filter_by" value="termurah" id="termurah">
                <label class="form-check-label" for="termurah">Termurah</label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="filter_by" value="termahal" id="termahal">
                <label class="form-check-label" for="termahal">Termahal</label>
              </div>
            </div>
          </div>
        </div>

        <!-- Submit Button -->
        <div class="row">
          <div class="col-md-12 text-end">
            <button type="submit" class="btn btn-primary">
              Apply Filters
            </button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
