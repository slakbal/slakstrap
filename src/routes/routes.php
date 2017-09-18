<?php

if (!App::environment('production')) {
    Route::get('_slakbal/slakstrap', function () {
        return view('slakstrap::design');
    })->name('slakbal.slakstrap.design');
}