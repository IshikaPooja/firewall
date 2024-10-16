<?php

use Firwalle\Rule\FirwalleController;

Route::middleware(['web','check.rule'])->group(function () {

    Route::name('firewall.')->prefix('firewall')->group(function(){
        Route::get('/whitelist',[FirwalleController::class,'whitelist'])->name('whitelist');
        Route::post('/whitelist_store',[FirwalleController::class,'whitelist_store'])->name("whitelist_store");
        Route::post('/whiteip_delete',[FirwalleController::class,'whiteip_delete'])->name("whiteip_delete");

        Route::get('/blacklist',[FirwalleController::class,'blacklist'])->name('blacklist');
        Route::post('/blacklist_store',[FirwalleController::class,'blacklist_store'])->name("blacklist_store");
        Route::post('/blackip_delete',[FirwalleController::class,'blackip_delete'])->name("blackip_delete");

        Route::get('/oslist',[FirwalleController::class,'oslist'])->name('oslist');
        Route::post('/oslist_store',[FirwalleController::class,'oslist_store'])->name("oslist_store");
        Route::post('/os_delete',[FirwalleController::class,'os_delete'])->name("os_delete");

        Route::get('/browserlist',[FirwalleController::class,'browserlist'])->name('browserlist');
        Route::post('/browserlist_store',[FirwalleController::class,'browserlist_store'])->name("browserlist_store");
        Route::post('/browser_delete',[FirwalleController::class,'browser_delete'])->name("browser_delete");

        Route::get('/geolist',[FirwalleController::class,'geolist'])->name('geolist');
        Route::post('/geolist_store',[FirwalleController::class,'geolist_store'])->name("geolist_store");
        Route::post('/geo_delete',[FirwalleController::class,'geo_delete'])->name("geo_delete");

    });
    Route::fallback(function() {
        abort(404);
      });


});
