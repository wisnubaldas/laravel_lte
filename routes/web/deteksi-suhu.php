<?php
use App\Http\Controllers\SuhuController;
Route::prefix('deteksi-suhu')->group(function()
{
    Route::get('/', [SuhuController::class, 'dashboard']);
    Route::get('/create-alat', [SuhuController::class, 'create']);
    Route::get('/report', [SuhuController::class, 'report']);

});
