<?php

use App\Http\Controllers\BranchController;
use App\Http\Controllers\BusinessController;
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

Route::get('/', [BusinessController::class, 'index'])->name('index');

Route::group(['as' => 'business.'], function () {
    Route::get('/business', [BusinessController::class, 'showAddBusiness'])->name('add');
    Route::post('/business', [BusinessController::class, 'addBusiness'])->name('post');
    Route::delete('/business/{business_id}', [BusinessController::class, 'deleteBusiness'])->name('delete');
});

Route::group(['as' => 'branch.'], function () {
    Route::get('/branch/{business_id}', [BranchController::class, 'index'])->name('list');
    Route::get('/branch/{business_id}/add', [BranchController::class, 'showAddBranch'])->name('add');
    Route::post('/branch/{business_id}', [BranchController::class, 'addBranch'])->name('post');
    Route::delete('/branch/{branch_id}', [BranchController::class, 'removeBranch'])->name('delete');
});

// Route::get('/add-business')