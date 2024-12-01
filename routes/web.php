<?php
use App\Http\Controllers\OutletController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\PaketKiloanController;
use App\Http\Controllers\PeopleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransaksiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PaketSatuanController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('dashboard',[DashboardController::class,'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard.index');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//resource route untuk people
Route::resource('paket_kiloans',PaketKiloanController::class)->middleware(['auth', 'verified']);

//resource route untuk people
Route::resource('peoples',PeopleController::class)->middleware(['auth', 'verified']);

Route::resource('transaksis',TransaksiController::class)->middleware(['auth', 'verified']);

require __DIR__.'/auth.php';

Route::resource('pelanggans', PelangganController::class)->middleware(['auth', 'verified']);

Route::get('invoices/{transaksi}/create',[InvoiceController::class, 'create'])->middleware(['auth', 'verified'])
->name('invoices.create');
Route::post('invoices/{transaksi}/store',[InvoiceController::class, 'store'])->middleware(['auth', 'verified'])
->name('invoices.store');
Route::resource('invoices',InvoiceController::class)->middleware(['auth', 'verified'])
    ->except(['create','store']);    

Route::resource('paket_satuans', PaketSatuanController::class)->middleware(['auth', 'verified']);

Route::resource('outlet', OutletController::class)->middleware(['auth', 'verified']);
