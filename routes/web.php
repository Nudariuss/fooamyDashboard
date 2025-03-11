<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dashboard\Analytics;
use App\Http\Controllers\layouts\WithoutMenu;
use App\Http\Controllers\layouts\WithoutNavbar;
use App\Http\Controllers\layouts\Fluid;
use App\Http\Controllers\layouts\Container;
use App\Http\Controllers\layouts\Blank;
use App\Http\Controllers\pages\AccountSettingsAccount;
use App\Http\Controllers\pages\AccountSettingsNotifications;
use App\Http\Controllers\pages\AccountSettingsConnections;
use App\Http\Controllers\pages\MiscError;
use App\Http\Controllers\pages\MiscUnderMaintenance;
use App\Http\Controllers\authentications\LoginBasic;
use App\Http\Controllers\authentications\RegisterBasic;
use App\Http\Controllers\authentications\ForgotPasswordBasic;

// Fooamy Laundry
use App\Http\Controllers\laporan_keuangan\LaporanPemasukan;
use App\Http\Controllers\laporan_keuangan\LaporanPengeluaran;
use App\Http\Controllers\laporan_keuangan\FilterLaporan;

use App\Http\Controllers\account\Account;
use App\Http\Controllers\account\OrderController;

use App\Http\Controllers\history_login\HistoryLogin;

use App\Http\Controllers\layanan\ListLayanan;
use App\Http\Controllers\layanan\FilterLayanan;
use App\Http\Controllers\layanan\AddLayanan;

use App\Http\Controllers\pakaian\ListPakaian;
use App\Http\Controllers\pakaian\FilterPakaian;
use App\Http\Controllers\pakaian\AddPakaian;

use App\Http\Controllers\Lokasi\Lokasi;

use App\Http\Controllers\inventaris\ListInventaris;
use App\Http\Controllers\inventaris\FilterInventaris;

use App\Http\Controllers\promo\ListPromo;

use App\Http\Controllers\keluhan\ListKeluhanOperasional;
use App\Http\Controllers\keluhan\ListKeluhanAplikasi;
use App\Http\Controllers\keluhan\DetailKeluhanOperasional;
use App\Http\Controllers\keluhan\DetailKeluhanAplikasi;
use PgSql\Lob;

// Main Page Route
Route::get('/', [Analytics::class, 'index'])->name('dashboard');

// laporan keuangan
Route::get('/laporan-keuangan/pemasukan', [LaporanPemasukan::class, 'index'])->name('laporan-keuangan-pemasukan');
Route::get('/laporan-keuangan/pengeluaran', [LaporanPengeluaran::class, 'index'])->name('laporan-keuangan-pengeluaran');
Route::get('/laporan-keuangan/filter', [FilterLaporan::class, 'index'])->name('laporan-filter');
Route::get('/laporan-keuangan/filter-results', [FilterLaporan::class, 'filterResults'])->name('laporan-filter-results');


// Account Routes
Route::prefix('account')->group(function () {
  Route::get('/create', [Account::class, 'create'])->name('account-create');
  Route::post('/store', [Account::class, 'store'])->name('account-store');
  Route::get('/filter', [Account::class, 'filter'])->name('account-filter');
  Route::get('/filter/results', [Account::class, 'filterResults'])->name('account-filter-results');
  Route::get('/{role}', [Account::class, 'index'])->name('account-list');
  Route::delete('/{id}', [Account::class, 'destroy'])->name('account-delete');
  Route::get('/{role}/{id}/overview', [Account::class, 'detailOverview'])->name('account-detail-overview');
  Route::post('/{id}/update-status', [Account::class, 'updateStatus'])->name('account-update-status');
  Route::get('{role}/{id}/order', [OrderController::class, 'index'])->name('account-detail-order');
  Route::get('{role}/{id}/order/{orderId}', [OrderController::class, 'show'])->name('account-order-detail');
  Route::get('/{role}/{id}/operation', [Account::class, 'detailOperation'])->name('account-detail-operation');
});

// History Login
Route::get('/historylogin/list', [HistoryLogin::class, 'index'])->name('list-historylogin');

// layanan
Route::get('/layanan/list', [ListLayanan::class, 'index'])->name('layanan-list');
// Route::get('/layanan/{id}', [ListLayanan::class, 'index'])->name('list-layanan');
Route::get('/layanan/filter', [FilterLayanan::class, 'index'])->name('filter-layanan');
Route::get('/layanan/add', [AddLayanan::class, 'index'])->name('layanan-add');

// pakaian
Route::get('/pakaian/list', [ListPakaian::class, 'index'])->name('list-pakaian');
Route::get('/pakaian/filter', [FilterPakaian::class, 'index'])->name('filter-pakaian');
Route::get('/pakaian/add', [AddPakaian::class, 'create'])->name('add-pakaian');

// Lokasi
Route::prefix('/lokasi')->group(function () {
  Route::redirect('/list', '/lokasi/hq/list');
  Route::get('{type?}/list', [Lokasi::class, 'listLokasi'])
    ->where('type', 'hq|locket')
    ->name('lokasi-list');
  Route::get('{type}/{id}/detail', [Lokasi::class, 'detailLokasi'])
    ->where(['type' => 'hq|locket', 'id' => '[0-9]+'])
    ->name('lokasi-detail');
  Route::get('{type}/create', [Lokasi::class, 'create'])
    ->where('type', 'hq|locket')
    ->name('lokasi-create');
  Route::post('/lokasi/{type}/store', [Lokasi::class, 'store'])
    ->where('type', 'hq|locket')
    ->name('lokasi-store');
  Route::get('{type}/{id}/edit', [Lokasi::class, 'edit'])
    ->where(['type' => 'hq|locket', 'id' => '[0-9]+'])
    ->name('lokasi-edit');
  Route::put('{type}/{id}/update', [Lokasi::class, 'update'])
    ->where(['type' => 'hq|locket', 'id' => '[0-9]+'])
    ->name('lokasi-update');
  Route::delete('{type}/{id}/delete', [Lokasi::class, 'destroy'])
    ->where(['type' => 'hq|locket', 'id' => '[0-9]+'])
    ->name('lokasi-destroy');
  Route::get('/lokasi/{type}/filter', [Lokasi::class, 'filter'])
    ->where('type', 'hq|locket')
    ->name('lokasi-filter');
});



// inventaris
Route::get('/inventaris/list', [ListInventaris::class, 'index'])->name('list-inventaris');
Route::get('/inventaris/filter', [FilterInventaris::class, 'filter'])->name('filter-inventaris');



// promo
Route::get('/promo/list', [ListPromo::class, 'index'])->name('list-promo');


// keluhan
Route::get('/keluhan/operasional/list', [ListKeluhanOperasional::class, 'index'])->name('list-keluhan-operasional');
Route::get('/keluhan/aplikasi/list', [ListKeluhanAplikasi::class, 'index'])->name('list-keluhan-aplikasi');
Route::get('/keluhan/operasional/{id_keluhan}/detail', [DetailKeluhanOperasional::class, 'detail'])->name('detail-keluhan-operasional');
Route::get('/keluhan/aplikasi/{id_keluhan}/detail', [DetailKeluhanAplikasi::class, 'detail'])->name('detail-keluhan-aplikasi');



// layout
Route::get('/layouts/without-menu', [WithoutMenu::class, 'index'])->name('layouts-without-menu');
Route::get('/layouts/without-navbar', [WithoutNavbar::class, 'index'])->name('layouts-without-navbar');
Route::get('/layouts/fluid', [Fluid::class, 'index'])->name('layouts-fluid');
Route::get('/layouts/container', [Container::class, 'index'])->name('layouts-container');
Route::get('/layouts/blank', [Blank::class, 'index'])->name('layouts-blank');

// pages
Route::get('/pages/account-settings-account', [AccountSettingsAccount::class, 'index'])->name('pages-account-settings-account');
Route::get('/pages/account-settings-notifications', [AccountSettingsNotifications::class, 'index'])->name('pages-account-settings-notifications');
Route::get('/pages/account-settings-connections', [AccountSettingsConnections::class, 'index'])->name('pages-account-settings-connections');
Route::get('/pages/misc-error', [MiscError::class, 'index'])->name('pages-misc-error');
Route::get('/pages/misc-under-maintenance', [MiscUnderMaintenance::class, 'index'])->name('pages-misc-under-maintenance');

// authentication
Route::get('/auth/login-basic', [LoginBasic::class, 'index'])->name('auth-login-basic');
Route::get('/auth/login', [LoginBasic::class, 'index'])->name('auth-login');
Route::get('/auth/register-basic', [RegisterBasic::class, 'index'])->name('auth-register-basic');
Route::get('/auth/forgot-password-basic', [ForgotPasswordBasic::class, 'index'])->name('auth-reset-password-basic');
