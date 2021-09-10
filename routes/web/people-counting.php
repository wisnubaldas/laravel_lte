<?php
use App\Http\Controllers\PeopleCountingController;
Route::prefix('people-counting')->group(function()
{
    Route::get('/', [PeopleCountingController::class, 'index']);
    Route::get('/create-alat', [PeopleCountingController::class, 'create']);
    Route::get('/report', [PeopleCountingController::class, 'report']);

});
