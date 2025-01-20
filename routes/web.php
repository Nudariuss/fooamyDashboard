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
use App\Http\Controllers\cards\CardBasic;
use App\Http\Controllers\user_interface\Accordion;
use App\Http\Controllers\user_interface\Alerts;
use App\Http\Controllers\user_interface\Badges;
use App\Http\Controllers\user_interface\Buttons;
use App\Http\Controllers\user_interface\Carousel;
use App\Http\Controllers\user_interface\Collapse;
use App\Http\Controllers\user_interface\Dropdowns;
use App\Http\Controllers\user_interface\Footer;
use App\Http\Controllers\user_interface\ListGroups;
use App\Http\Controllers\user_interface\Modals;
use App\Http\Controllers\user_interface\Navbar;
use App\Http\Controllers\user_interface\Offcanvas;
use App\Http\Controllers\user_interface\PaginationBreadcrumbs;
use App\Http\Controllers\user_interface\Progress;
use App\Http\Controllers\user_interface\Spinners;
use App\Http\Controllers\user_interface\TabsPills;
use App\Http\Controllers\user_interface\Toasts;
use App\Http\Controllers\user_interface\TooltipsPopovers;
use App\Http\Controllers\user_interface\Typography;
use App\Http\Controllers\extended_ui\PerfectScrollbar;
use App\Http\Controllers\extended_ui\TextDivider;
use App\Http\Controllers\icons\Boxicons;
use App\Http\Controllers\form_elements\BasicInput;
use App\Http\Controllers\form_elements\InputGroups;
use App\Http\Controllers\form_layouts\VerticalForm;
use App\Http\Controllers\form_layouts\HorizontalForm;
use App\Http\Controllers\tables\Basic as TablesBasic;
// Fooamy Laundry
use App\Http\Controllers\laporan_keuangan\LaporanPemasukan;
use App\Http\Controllers\laporan_keuangan\LaporanPengeluaran;
use App\Http\Controllers\laporan_keuangan\FilterLaporan;

use App\Http\Controllers\account\ListAccount;
use App\Http\Controllers\account\DetailAccount;
use App\Http\Controllers\account\CreateAccount;
use App\Http\Controllers\account\DetailAccountOrder;
use App\Http\Controllers\account\DetailAccountOperation;
use App\Http\Controllers\layanan\ListLayanan;
use App\Http\Controllers\layanan\FilterLayanan;
use App\Http\Controllers\layanan\AddLayanan;

use App\Http\Controllers\pakaian\ListPakaian;
use App\Http\Controllers\pakaian\FilterPakaian;
use App\Http\Controllers\pakaian\AddPakaian;

use App\Http\Controllers\lokasi\ListLokasiHQ;
use App\Http\Controllers\lokasi\AddLokasiHQ;
use App\Http\Controllers\lokasi\EditLokasiHQ;
use App\Http\Controllers\lokasi\DetailLokasiHQ;

use App\Http\Controllers\lokasi\ListLokasiLoket;
use App\Http\Controllers\lokasi\AddLokasiLoket;
use App\Http\Controllers\lokasi\DetailLokasiLoket;
use App\Http\Controllers\lokasi\EditLokasiLoket;

use App\Http\Controllers\inventaris\ListInventaris;
use App\Http\Controllers\inventaris\FilterInventaris;

use App\Http\Controllers\promo\ListPromo;

use App\Http\Controllers\keluhan\ListKeluhanOperasional;
use App\Http\Controllers\keluhan\ListKeluhanAplikasi;
use App\Http\Controllers\keluhan\DetailKeluhanOperasional;
use App\Http\Controllers\keluhan\DetailKeluhanAplikasi;


// Main Page Route
Route::get('/', [Analytics::class, 'index'])->name('dashboard');

// laporan keuangan
Route::get('/laporan-keuangan/pemasukan', [LaporanPemasukan::class, 'index'])->name('laporan-keuangan-pemasukan');
Route::get('/laporan-keuangan/pengeluaran', [LaporanPengeluaran::class, 'index'])->name('laporan-keuangan-pengeluaran');
Route::get('/laporan-keuangan/filter', [FilterLaporan::class, 'index'])->name('filter-laporan');
Route::get('/laporan-keuangan/filter-results', [FilterLaporan::class, 'filterResults'])->name('filter-results');


// account
Route::get('/account/list', [ListAccount::class, 'index'])->name('account-list-account');
Route::get('/account/create', [CreateAccount::class, 'index'])->name('account-create-account');
// Route::post('/account/store', [CreateAccount::class, 'store'])->name('account-store');
Route::get('/account/list/{role}', [ListAccount::class, 'index'])->name('list-account');
Route::get('/account/filter', function () {
  return view('content.account.filter-account');
})->name('account-filter-account');
Route::get('/account/filter/results', [ListAccount::class, 'filterResults'])->name('filter-results-account');
Route::get('/account/detail/{id}/{role?}', [DetailAccount::class, 'index'])
  ->name('account-detail-account')
  ->where('role', 'customer|driver|hq|loket|management|mitra'); // Validasi parameter role
Route::get('/account/detail/{id}/{role}/order', [DetailAccountOrder::class, 'index'])
  ->name('account-detail-account-order');
Route::get('/account/detail/{id}/{role}/operation', [DetailAccountOperation::class, 'index'])->name('account-detail-account-operation');



// layanan
Route::get('/layanan/list', [ListLayanan::class, 'index'])->name('layanan-list');
// Route::get('/layanan/{id}', [ListLayanan::class, 'index'])->name('list-layanan');
Route::get('/layanan/filter', [FilterLayanan::class, 'index'])->name('filter-layanan');
Route::get('/layanan/add', [AddLayanan::class, 'index'])->name('layanan-add');

// pakaian
Route::get('/pakaian/list', [ListPakaian::class, 'index'])->name('list-pakaian');
Route::get('/pakaian/filter', [FilterPakaian::class, 'index'])->name('filter-pakaian');
Route::get('/pakaian/add', [AddPakaian::class, 'create'])->name('add-pakaian');
// Route::prefix('pakaian')->group(function () {
//   Route::get('/', [ListPakaian::class, 'index'])->name('list-pakaian');
//   Route::get('/filter', [FilterPakaian::class, 'index'])->name('filter-pakaian');
//   Route::post('/filter', [FilterPakaian::class, 'filter'])->name('apply-filter-pakaian');
//   Route::get('/add', [AddPakaian::class, 'create'])->name('add-pakaian');
//   Route::post('/add', [AddPakaian::class, 'store'])->name('save-pakaian');
// });

// lokasi
// hq
Route::get('/lokasi/hq/list', [ListLokasiHQ::class, 'index'])->name('list-lokasi-hq');
Route::get('/lokasi/hq/add', [AddLokasiHQ::class, 'index'])->name('add-lokasi-hq');
Route::post('/lokasi/hq/store', [AddLokasiHQ::class, 'store'])->name('store-lokasi-hq');
Route::get('/lokasi/hq/{id_hq}/detail', [DetailLokasiHQ::class, 'index'])->name('detail-lokasi-hq');
Route::get('/lokasi/hq/{id_hq}/edit', [EditLokasiHQ::class, 'index'])->name('edit-lokasi-hq');
Route::put('/lokasi/hq/{id_hq}/update', [EditLokasiHQ::class, 'update'])->name('update-lokasi-hq');
// loket
Route::get('/lokasi/loket/list', [ListLokasiLoket::class, 'index'])->name('list-lokasi-loket');
Route::get('/lokasi/loket/add', [AddLokasiLoket::class, 'index'])->name('add-lokasi-loket');
Route::post('/lokasi/loket/store', [AddLokasiLoket::class, 'store'])->name('store-lokasi-loket');
Route::get('/lokasi/loket/{id_loket}/detail', [DetailLokasiLoket::class, 'index'])->name('detail-lokasi-loket');
Route::get('/lokasi/loket/{id_loket}/edit', [EditLokasiLoket::class, 'index'])->name('edit-lokasi-loket');
Route::post('/lokasi/loket/{id_loket}/update', [EditLokasiLoket::class, 'update'])->name('update-lokasi-loket');


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

// cards
Route::get('/cards/basic', [CardBasic::class, 'index'])->name('cards-basic');

// User Interface
Route::get('/ui/accordion', [Accordion::class, 'index'])->name('ui-accordion');
Route::get('/ui/alerts', [Alerts::class, 'index'])->name('ui-alerts');
Route::get('/ui/badges', [Badges::class, 'index'])->name('ui-badges');
Route::get('/ui/buttons', [Buttons::class, 'index'])->name('ui-buttons');
Route::get('/ui/carousel', [Carousel::class, 'index'])->name('ui-carousel');
Route::get('/ui/collapse', [Collapse::class, 'index'])->name('ui-collapse');
Route::get('/ui/dropdowns', [Dropdowns::class, 'index'])->name('ui-dropdowns');
Route::get('/ui/footer', [Footer::class, 'index'])->name('ui-footer');
Route::get('/ui/list-groups', [ListGroups::class, 'index'])->name('ui-list-groups');
Route::get('/ui/modals', [Modals::class, 'index'])->name('ui-modals');
Route::get('/ui/navbar', [Navbar::class, 'index'])->name('ui-navbar');
Route::get('/ui/offcanvas', [Offcanvas::class, 'index'])->name('ui-offcanvas');
Route::get('/ui/pagination-breadcrumbs', [PaginationBreadcrumbs::class, 'index'])->name('ui-pagination-breadcrumbs');
Route::get('/ui/progress', [Progress::class, 'index'])->name('ui-progress');
Route::get('/ui/spinners', [Spinners::class, 'index'])->name('ui-spinners');
Route::get('/ui/tabs-pills', [TabsPills::class, 'index'])->name('ui-tabs-pills');
Route::get('/ui/toasts', [Toasts::class, 'index'])->name('ui-toasts');
Route::get('/ui/tooltips-popovers', [TooltipsPopovers::class, 'index'])->name('ui-tooltips-popovers');
Route::get('/ui/typography', [Typography::class, 'index'])->name('ui-typography');

// extended ui
Route::get('/extended/ui-perfect-scrollbar', [PerfectScrollbar::class, 'index'])->name('extended-ui-perfect-scrollbar');
Route::get('/extended/ui-text-divider', [TextDivider::class, 'index'])->name('extended-ui-text-divider');

// icons
Route::get('/icons/boxicons', [Boxicons::class, 'index'])->name('icons-boxicons');

// form elements
Route::get('/forms/basic-inputs', [BasicInput::class, 'index'])->name('forms-basic-inputs');
Route::get('/forms/input-groups', [InputGroups::class, 'index'])->name('forms-input-groups');

// form layouts
Route::get('/form/layouts-vertical', [VerticalForm::class, 'index'])->name('form-layouts-vertical');
Route::get('/form/layouts-horizontal', [HorizontalForm::class, 'index'])->name('form-layouts-horizontal');

// tables
Route::get('/tables/basic', [TablesBasic::class, 'index'])->name('tables-basic');
