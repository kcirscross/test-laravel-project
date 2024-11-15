<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ContactController;
use App\Http\Controllers\API\ManagerController;
use App\Http\Controllers\API\TagController;
use App\Http\Controllers\API\OpportunityController;
use App\Http\Controllers\API\TaskController;


Route::middleware('auth:sanctum')->group(function () {

    // API cho contact
    Route::get('contacts', [ContactController::class, 'index']);
    Route::get('contacts/{id}', [ContactController::class, 'show'])->where('id', '[0-9]+');
    Route::post('contacts', [ContactController::class, 'store']);
    Route::put('contacts/{id}', [ContactController::class, 'update'])->where('id', '[0-9]+');
    Route::put('contacts/update-multiple/', [ContactController::class, 'updateMultiple']);
    Route::delete('contacts/{id}', [ContactController::class, 'destroy']);
    Route::delete('contacts', [ContactController::class, 'destroyMultiple']);
    Route::get('contacts/filter', [ContactController::class, 'filter']);

    // API cho tag
    Route::apiResource('tags', TagController::class);

    // API cho manager
    Route::get('managers', [ManagerController::class, 'index']);
    Route::post('managers', [ManagerController::class, 'store']);
    Route::get('managers/{id}', [ManagerController::class, 'show']);
    Route::put('managers/{id}', [ManagerController::class, 'update']);
    Route::delete('managers/{id}', [ManagerController::class, 'destroy']);

    // API cho opportunity
    Route::get('opportunities/filter', [OpportunityController::class, 'filter']);

    // API cho task
    Route::get('tasks/filter', [TaskController::class, 'filter']);

});

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
