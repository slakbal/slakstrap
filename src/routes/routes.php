<?php

if (!App::environment('production')) {

    //apply the web group middleware so that the session is started for the provider
    Route::prefix('_slakbal')->middleware(['web'])->group(function () {

        Route::get('slakstrap', function () {
            return view('slakstrap::design');
        })->name('slakbal.slakstrap.design');

        Route::post('validate', function () {

            //dd(request()->all());

            request()->validate([
                'first_name' => 'required',
                'last_name' => 'required',
                'business_name' => 'required|min:10',
                'email' => 'required|email',
                'password' => 'required|min:5',
                'search' => 'required',
                'tel' => 'required',
                'number' => 'required',
                'date' => 'required',
                'datetime' => 'required',
                'datetimeLocal' => 'required',
                'time' => 'required',
                'url' => 'required',
                'file' => 'required',
                'textarea' => 'required',
                'size' => 'required',
                'checkbox' => 'required',
                'radio' => 'required',
            ]);
        })->name('slakbal.slakstrap.validate');

    });
}