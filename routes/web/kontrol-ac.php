<?php
use App\Http\Controllers\KontrolAcController;
Route::prefix('kontrol-ac')->group(function()
{
    Route::get('/', [KontrolAcController::class, 'dashboard']);
    Route::get('/create-alat', [KontrolAcController::class, 'create']);
    Route::get('/report', [KontrolAcController::class, 'report']);

});
