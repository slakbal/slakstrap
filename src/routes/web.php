<?php

if (!App::environment('production')) {

    Route::get('/slakstrap', function () {
        return view('slakstrap');
    });

}