<?php

use App\Http\Controllers\Auth\ForgotPasswordController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PurchaseOrder\InvoiceController;
use App\Http\Controllers\PurchaseOrder\PurchaseOrderController;
use App\Http\Controllers\PurchaseOrder\SupplierController;

use App\Http\Controllers\Inventory\ProductsController;

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


// * COMMENTED FOR TESTING
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login.verify');
    Route::post('/forgot-password', [ForgotPasswordController::class, 'verify'])->name('forgot-password.verify');
    Route::get('/reset-password/{email}/{token}', [ForgotPasswordController::class, 'index'])->name('reset-password.index');
    Route::post('/reset-password/{token}', [ForgotPasswordController::class, 'reset'])->name('reset-password.verify');
});

Route::middleware('auth')->group(function () {
    Route::get('/all/supplier', [SupplierController::class, 'index'])->name('supplier.index');
    Route::post('/store/supplier', [SupplierController::class, 'storeSupplier'])->name('supplier.store');
    Route::get('/delete/supplier/{id}', [SupplierController::class, 'deleteSupplier'])->name('supplier.delete');
    Route::post('/edit/supplier', [SupplierController::class, 'editSupplier'])->name('supplier.edit');

    Route::get('/create/PurchaseOrder', [PurchaseOrderController::class, 'index'])->name('po.index');
    Route::post('/store/PurchaseOrder', [PurchaseOrderController::class, 'create'])->name('po.create');
    Route::get('/PR/PurchaseOrder', [PurchaseOrderController::class, 'showPR'])->name('po.showpr');
    Route::get('/download/{id}', [PurchaseOrderController::class, 'download'])->name('po.download');
    Route::get('/delete/PurchaseOrder/{id}', [PurchaseOrderController::class, 'deletePO'])->name('po.delete');

    Route::get('/invoice', [InvoiceController::class, 'index'])->name('invoice.index');
    Route::post('/invoice/{id}', [InvoiceController::class, 'sendmail'])->name('invoice.sendmail');

    // Inventory

    Route::get('/inventory', [ProductsController::class, 'index'])->name('product.index');
    Route::post('/inventory/add-product', [ProductsController::class, 'store'])->name('product.store');
    Route::get('/inventory/product-data/{id}', [ProductsController::class, 'getProductData'])->name('product.data');
    Route::post('/inventory/edit-product', [ProductsController::class, 'edit'])->name('product.edit');
    Route::get('/inventory/delete-product/{id}', [ProductsController::class, 'delete'])->name('product.delete');



});


require __DIR__ . '/auth.php';