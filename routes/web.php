<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PurchaseOrder\InvoiceController;
use App\Http\Controllers\PurchaseOrder\PurchaseOrderController;
use App\Http\Controllers\PurchaseOrder\SupplierController;
use App\Http\Controllers\PurchaseOrder\QirController;
use App\Http\Controllers\PurchaseOrder\PoDocumentController;
use App\Http\Controllers\Inventory\StockController;

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
});

Route::middleware('auth')->group(function () {
    //Supplier Page
    Route::get('/all/supplier', [SupplierController::class, 'index'])->name('supplier.index');
    Route::post('/store/supplier', [SupplierController::class, 'storeSupplier'])->name('supplier.store');
    Route::get('/delete/supplier/{id}', [SupplierController::class, 'deleteSupplier'])->name('supplier.delete');
    Route::post('/edit/supplier', [SupplierController::class, 'editSupplier'])->name('supplier.edit');
    Route::get('/get/supplier', [SupplierController::class, 'getSupplier'])->name('supplier.get');

    //Purchase Order Page
    Route::get('/create/PurchaseOrder', [PurchaseOrderController::class, 'index'])->name('po.index');
    Route::post('/store/PurchaseOrder', [PurchaseOrderController::class, 'create'])->name('po.create');
    Route::get('/PR/PurchaseOrder', [PurchaseOrderController::class, 'showPR'])->name('po.showpr');
    Route::get('/download/{id}', [PurchaseOrderController::class, 'download'])->name('po.download');
    Route::get('/delete/PurchaseOrder/{id}', [PurchaseOrderController::class, 'deletePO'])->name('po.delete');

    //Invoice Page
    Route::get('/invoice', [InvoiceController::class, 'index'])->name('invoice.index');
    Route::post('/invoice/{id}', [InvoiceController::class, 'sendmail'])->name('invoice.sendmail');

    //Quality Inspection Report Page
    Route::get('/quality/report', [QirController::class, 'index'])->name('qir.index');
    Route::post('/quality/add/report', [QirController::class, 'addQualitycheck'])->name('qir.addQualitycheck');
    Route::get('/quality/download/{id}', [QirController::class, 'download'])->name('qir.download');
    Route::get('/quality/get/{id}', [QirController::class, 'getItem'])->name('qir.getItem');
    Route::post('/quality/update/report', [QirController::class, 'updateReport'])->name('qir.updateReport');
    Route::post('/quality/delete/report', [QirController::class, 'deleteReport'])->name('qir.deleteReport');
    Route::post('/quality/return/{id}', [QirController::class, 'requestReturn'])->name('qir.requestReturn');
    Route::post('/quality/release/{id}', [QirController::class, 'releaseOrder'])->name('qir.releaseOrder');

    //Purchase Order Report and Documentation
    Route::get('/po/documentation', [PoDocumentController::class, 'index'])->name('document.index');
    Route::get('/po/description', [PoDocumentController::class, 'getPODescription'])->name('document.description');
    Route::delete('/po/delete', [PoDocumentController::class, 'deleteDocument'])->name('document.delete');



    // Inventory
    Route::get('/inventory', [ProductsController::class, 'index'])->name('product.index');
    Route::post('/inventory/add-product', [ProductsController::class, 'store'])->name('product.store');
    Route::get('/inventory/product-data/{id}', [ProductsController::class, 'getProductData'])->name('product.data');
    Route::post('/inventory/edit-product', [ProductsController::class, 'edit'])->name('product.edit');
    Route::get('/inventory/delete-product/{id}', [ProductsController::class, 'delete'])->name('product.delete');


    Route::post('/inventory/add-category', [ProductsController::class, 'addCategory'])->name('product.category');
    Route::delete('/inventory/delete-category', [ProductsController::class, 'deleteCategory'])->name('category.delete');

    //Inventory Stock
    Route::get('/inventory/stock', [StockController::class, 'index'])->name('stock.index');
    Route::post('/inventory/update/stock', [StockController::class, 'updateStock'])->name('stock.updateStock');
});


require __DIR__ . '/auth.php';