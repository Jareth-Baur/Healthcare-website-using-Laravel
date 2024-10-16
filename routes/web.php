<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\EmployeeController;

use App\Http\Controllers\PatientsController;
use App\Http\Controllers\DoctorsController;
use App\Http\Controllers\PharmaciesController;
use Illuminate\Support\Facades\Route;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
/*
    Route::get('products', [ProductController::class, 'list'])->name('products.list');
    Route::get('orders',[OrderController::class, 'normalList'])->name('orders.list');
    Route::get('orderServer',[OrderController::class, 'serverList'])->name('orders.serverList');
    Route::get('employees',[EmployeeController::class, 'list'])->name('employeelist');
 */
Route::get('patients/list', [PatientsController::class, 'list'])->name('patients.list');
Route::get('patients/add', [PatientsController::class, 'add_patient']);

Route::post('patients/record', [PatientsController::class, 'store']) ->name('record_patient');

Route::get('doctors', [DoctorsController::class, 'list'])->name('doctors.list');
Route::post('doctor/record', [DoctorsController::class, 'store']);

Route::get('pharmacies/list', [PharmaciesController::class, 'list'])->name('pharmacies.list');
Route::post('pharmacies/record', [PharmaciesController::class, 'store']);
});

require __DIR__.'/auth.php';
