@php
$container = 'container-fluid';
$containerNav = 'container-fluid';
$isNavbar = false;
@endphp

@extends('layouts/contentNavbarLayout')

@section('page-script')
@vite('resources/assets/js/bottombar.js')
@endsection

@section('page-script')
@vite('resources/assets/js/laporan-pemasukan.js')
@endsection

@section('title', 'Laporan Keuangan - Pemasukan')

@section('content')
<div class="content">

  <x-judul title="Laporan Keuangan Pemasukan" />
  <!-- Breadcrumb -->
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb breadcrumb-style1">
      <li class="breadcrumb-item">
        <a href="{{ url('/') }}">Dashboard</a>
      </li>
      <li class="breadcrumb-item">
        <a href="javascript:void(0);">Laporan Keuangan</a>
      </li>
      <li class="breadcrumb-item active">
        <a href="{{ route('laporan-keuangan-pemasukan') }}">Pemasukan</a>
      </li>
    </ol>
  </nav>
  <!--/ Breadcrumb -->
      <!-- Summary Cards -->
      <div class="row mb-4">
          <div class="col-md-3">
              <div class="card">
                  <div class="card-body text-center">
                      <h5>DAY</h5>
                      <h2>$5,345.43</h2>
                      <p>5k orders <span class="badge bg-success">+5.7%</span></p>
                  </div>
              </div>
          </div>
          <div class="col-md-3">
              <div class="card">
                  <div class="card-body text-center">
                      <h5>WEEK</h5>
                      <h2>$674,347.12</h2>
                      <p>21k orders <span class="badge bg-success">+12.4%</span></p>
                  </div>
              </div>
          </div>
          <div class="col-md-3">
              <div class="card">
                  <div class="card-body text-center">
                      <h5>MONTH</h5>
                      <h2>$14,235.12</h2>
                      <p>6k orders</p>
                  </div>
              </div>
          </div>
          <div class="col-md-3">
              <div class="card">
                  <div class="card-body text-center">
                      <h5>YEAR</h5>
                      <h2>$8,345.23</h2>
                      <p>150 orders <span class="badge bg-danger">-3.5%</span></p>
                  </div>
              </div>
          </div>
      </div>

      <!-- Filter and Table Combined -->
      <div class="row">
          <div class="col-md-12">
              <div class="card">
                  <div class="card-body">
                      <!-- Filter Section -->
                      <div class="row mb-4">
                        <!-- Search Bar on the Left -->
                        <div class="col-md-6">
                            <form class="d-flex align-items-center">
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon1">
                                        <i class="bx bx-search"></i> <!-- Boxicons Search Icon -->
                                    </span>
                                    <input type="text" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="basic-addon1">
                                </div>
                            </form>
                        </div>

                        <!-- Buttons and Dropdown on the Right -->
                        <div class="col-md-6 d-flex justify-content-end align-items-center">
                            <!-- Clear Button -->
                            <button type="button" class="btn btn-secondary me-2">Clear</button>

                            <!-- Dropdown -->
                            <div class="dropdown me-2">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                    Options
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <li><a class="dropdown-item" href="#">Pemasukan</a></li>
                                    <li><a class="dropdown-item" href="#">Pengeluaran</a></li>
                                </ul>
                            </div>

                            <!-- Filter Button -->
                            <a href="{{ route('filter-laporan', ['type' => 'pemasukan']) }}" class="btn btn-primary">
                              <i class="bx bx-filter"></i> <!-- Boxicons Filter Icon -->
                            </a>
                        </div>
                    </div>

                      <!-- Table Section -->
                      <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                          <tr>
                              <!-- Checkbox Select All -->
                              <th scope="col">
                                  <input type="checkbox" id="selectAll" class="form-check-input">
                              </th>
                              <th scope="col">Product</th>
                              <th scope="col">Category</th>
                              <th scope="col">Stock</th>
                              <th scope="col">SKU</th>
                              <th scope="col">Price</th>
                              <th scope="col">Qty</th>
                              <th scope="col">Status</th>
                              <th scope="col">Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                              <td>
                                  <input type="checkbox" class="form-check-input select-item" data-price="125000">
                              </td>
                              <td>
                                  <img src="{{ asset('path/to/image.jpg') }}" alt="Product" width="40" class="me-2">
                                  Air Jordan
                              </td>
                              <td>Shoes</td>
                              <td>
                                  <div class="form-check form-switch">
                                      <input class="form-check-input" type="checkbox" checked>
                                  </div>
                              </td>
                              <td>31063</td>
                              <td>Rp 125,000</td>
                              <td>942</td>
                              <td><span class="badge bg-danger">Inactive</span></td>
                              <td>
                                  <button class="btn btn-sm btn-outline-secondary me-2"><i class="bx bx-edit"></i></button>
                                  <button class="btn btn-sm btn-outline-secondary"><i class="bx bx-dots-vertical"></i></button>
                              </td>
                          </tr>
                          <!-- Tambahkan item lainnya -->
                      </tbody>
                      </table>
                  </div>
                  <div class="card-footer d-flex justify-content-end">
                    <!-- Custom Pagination -->
                    <nav aria-label="Page navigation">
                        <ul class="pagination">
                            <!-- Previous Page -->
                            <li class="page-item disabled">
                                <a class="page-link" href="#"><i class="bx bx-chevron-left"></i></a>
                            </li>
                            <!-- Page Numbers -->
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">4</a></li>
                            <li class="page-item"><a class="page-link" href="#">5</a></li>
                            <li class="page-item disabled"><a class="page-link" href="#">...</a></li>
                            <li class="page-item"><a class="page-link" href="#">10</a></li>
                            <!-- Next Page -->
                            <li class="page-item">
                                <a class="page-link" href="#"><i class="bx bx-chevron-right"></i></a>
                            </li>
                        </ul>
                    </nav>
                </div>
              </div>
          </div>
      </div>
      <div class="bottombar p-3">
        <div class="d-flex justify-content-between align-items-center">
            <!-- Placeholder for other content (if needed) -->
            <div></div>

            <!-- Total Price -->
            <div class="d-flex align-items-center">
                <span class="fw-bold text-white">Rp <span id="totalPrice">0</span></span>
            </div>
        </div>
    </div>

</div>
@endsection
