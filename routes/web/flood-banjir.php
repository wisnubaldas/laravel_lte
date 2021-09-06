<?php
Route::prefix('flood-banjir')->group(function()
{
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
});
