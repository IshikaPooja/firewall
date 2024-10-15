<?php

use Firwalle\Rule\FirwalleController;

Route::get('hlo',function(){
    echo 'dfgf';
});
Route::middleware(['check.rule'])->group(function () {
    
    Route::name('firewall.')->prefix('firewall')->group(function(){
        Route::get('/whitelist',[FirwalleController::class,'whitelist'])->name('whitelist');
        Route::post('/whitelist_store',[FirwalleController::class,'whitelist_store'])->name("whitelist_store");

        Route::get('/blacklist',[FirwalleController::class,'blacklist'])->name('blacklist');
        Route::post('/blacklist_store',[FirwalleController::class,'blacklist_store'])->name("blacklist_store");

        Route::get('/oslist',[FirwalleController::class,'oslist'])->name('oslist');
        Route::post('/oslist_store',[FirwalleController::class,'oslist_store'])->name("oslist_store");

        Route::get('/browserlist',[FirwalleController::class,'browserlist'])->name('browserlist');
        Route::post('/browserlist_store',[FirwalleController::class,'browserlist_store'])->name("browserlist_store");

        Route::get('/geolist',[FirwalleController::class,'geolist'])->name('geolist');
        Route::post('/geolist_store',[FirwalleController::class,'geolist_store'])->name("geolist_store");
    });


});
