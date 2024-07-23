<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileUploadController;

Route::post('/upload', [FileUploadController::class, 'store']);