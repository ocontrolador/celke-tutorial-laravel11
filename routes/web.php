<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\EnviarSmsController;
use App\Http\Controllers\EnviarWhatsAppController;
use App\Http\Controllers\CallMeBotController;
use App\Http\Controllers\TextFlowController;
use Faker\Provider\ar_EG\Text;
use Illuminate\Support\Facades\Route;


Route::get('/', [UserController::class, 'index'])->name('users.index');

Route::post('users-import', [UserController::class, 'import'])->name('users.import');

// users.edit
Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');

// users.destroy
Route::get('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');

// get enviar-sms
Route::get('/sms/{codigo?}/{nome?}', [EnviarSmsController::class, 'index'])->name('enviar-sms.index');

// get enviar-whatsapp
Route::get('/whatsapp', [EnviarWhatsAppController::class, 'index'])->name('enviar-whatsapp.index');

// get callmebot
Route::get('/callmebot', [CallMeBotController::class, 'index'])->name('callmebot.index');

// get textflow
Route::get('/textflow', [TextFlowController::class, 'index'])->name('textflow.index'); // or Route::get('/textflow', [TextFlowController::class, 'index'])->name('textflow.index');
