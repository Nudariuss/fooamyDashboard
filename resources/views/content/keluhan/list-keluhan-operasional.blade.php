@php
$container = 'container-fluid';
$containerNav = 'container-fluid';
$isNavbar = false;
@endphp

@extends('layouts/contentNavbarLayout')

@section('page-script')
    @vite('resources/assets/js/list-promo-operasional.js')
@endsection

@section('title', 'List Keluhan Operasional')

@section('content')
<div class="container-fluid">
    <x-judul title="List Keluhan Operasional" />
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb breadcrumb-style1">
          <li class="breadcrumb-item">
              <a href="{{ url('/') }}">Dashboard</a>
          </li>
          <li class="breadcrumb-item">
            Keluhan
          </li>
          <li class="breadcrumb-item active">
            <a href="{{ url('/keluhan/operasional/list') }}">Operasional</a>
          </li>
      </ol>
  </nav>

    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <div class="input-group input-group-merge short-searchbar">
                <span class="input-group-text"><i class="bx bx-search"></i></span>
                <input type="text" class="form-control" placeholder="Cari Keluhan" />
            </div>

            <div class="d-flex gap-2">
              <div class="btn-group">
                <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                    {{ request()->routeIs('list-keluhan-operasional') ? 'Operasional' : 'Aplikasi' }}
                </button>
                <ul class="dropdown-menu">
                    <li>
                        <a class="dropdown-item {{ request()->routeIs('list-keluhan-operasional') ? 'active' : '' }}"
                            href="{{ route('list-keluhan-operasional') }}">
                            Operasional
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item {{ request()->routeIs('list-keluhan-aplikasi') ? 'active' : '' }}"
                            href="{{ route('list-keluhan-aplikasi') }}">
                            Aplikasi
                        </a>
                    </li>
                </ul>
              </div>

                <button class="btn btn-primary"><i class="bx bx-filter"></i> Filter</button>
            </div>
        </div>

        <div class="card-datatable table-responsive">
            <table class="table table-striped border-bottom">
                <thead class="bg-primary">
                    <tr>
                        <th>No</th>
                        <th>Judul Keluhan</th>
                        <th>Email</th>
                        <th>Nama</th>
                        <th>Role</th>
                        <th>Jenis Keluhan</th>
                        <th>Status</th>
                        <th>Tanggal</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                  @foreach ($keluhan as $item)
                  <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>
                        <a href="{{ route('detail-keluhan-operasional', ['id_keluhan' => $item['id_keluhan']]) }}">
                            {{ $item['judul_keluhan'] }}
                        </a>
                      </td>
                      <td>{{ $item['email'] }}</td>
                      <td>{{ $item['nama'] }}</td>
                      <td>{{ $item['role'] }}</td>
                      <td>{{ $item['jenis'] }}</td>
                      <td>
                          <span class="badge bg-{{ $item['status'] === 'Finished' ? 'success' : 'secondary' }}">
                                {{ $item['status'] }}
                          </span>
                      </td>
                      <td>{{ $item['tanggal'] }}</td>
                  </tr>
                  @endforeach
              </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
