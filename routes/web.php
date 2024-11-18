<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;

Route::redirect('/', '/productos');

Route::resource('productos', ProductoController::class);
