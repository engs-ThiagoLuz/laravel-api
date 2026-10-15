<?php

use App\Http\Controllers\JsonPlaceholderController;
use App\Http\Controllers\TarefaController;

Route::prefix('externo')->group(function () {
    Route::get('/posts', [JsonPlaceholderController::class, 'index']);
    Route::get('/posts/{id}', [JsonPlaceholderController::class, 'show']);
    Route::post('/posts', [JsonPlaceholderController::class, 'store']);
    
    
});

Route::apiResource('tarefa', TarefaController::class);