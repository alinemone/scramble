<?php

use Dedoc\Scramble\Http\Middleware\RestrictedDocsAccess;
use Illuminate\Support\Facades\Route;

Route::middleware(config('scramble.middleware', [RestrictedDocsAccess::class]))->group(function () {
    Route::get('docs/api.json', function (Dedoc\Scramble\Generator $generator) {
        return $generator();
    })->name('scramble.docs.index');

    Route::view(config('scramble.docs_url'), 'scramble::docs')->name('scramble.docs.api');
});
