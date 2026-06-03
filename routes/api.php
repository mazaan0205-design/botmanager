<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BotController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| These routes handle the "behind-the-scenes" data for your bots.
|
*/

// This route handles the "Save Changes" request from your bot configuration page
// Route::post('/bots/{id}/update', [BotController::class, 'update']);