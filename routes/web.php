<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BotController;

// Dashboard
Route::get('/', [BotController::class, 'index'])->name('dashboard');
Route::get('/dashboard', [BotController::class, 'index']);

// Bot Configuration
// Defining 'editBot' and 'bots.edit' as they are both called in your views
Route::get('/bot-config/{id}', [BotController::class, 'edit'])->name('editBot');
Route::get('/bot-config/{id}', [BotController::class, 'edit'])->name('bots.edit');
Route::get('/bot-config', function () {
    return redirect()->route('editBot', ['id' => 'new']);
});

// Knowledge Base
Route::get('/bots/{botId}/knowledge', [BotController::class, 'knowledgeBase'])->name('knowledgeBase');

// Test Preview
// Defining 'test.preview' and 'bots.test' to match your dashboard.blade.php calls
Route::get('/test-preview/{bot_id}', [BotController::class, 'showPreview'])->name('test.preview');
Route::get('/test-preview/{bot_id}', [BotController::class, 'showPreview'])->name('bots.test');

// API-Proxy Routes
Route::post('/bots/update/{id}', [BotController::class, 'update'])->name('bots.update');
Route::delete('/bots/delete/{id}', [BotController::class, 'destroy'])->name('bots.destroy');

// Static Pages
Route::get('/documentation', [BotController::class, 'documentation'])->name('documentation');
Route::get('/account', [BotController::class, 'account'])->name('account');
Route::get('/filter', function () { return back(); })->name('filter');