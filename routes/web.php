<?php

declare(strict_types=1);

use App\Http\Controllers\UploadController;
use Illuminate\Support\Facades\Route;

Route::post('upload', UploadController::class)->name('upload');
