<?php

use Illuminate\Support\Facades\Route;
use ClarionApp\ContactsBackend\Controllers\ContactController;
use ClarionApp\ContactsBackend\Controllers\GroupController;
use ClarionApp\ContactsBackend\Controllers\EmailController;
use ClarionApp\ContactsBackend\Controllers\PhoneController;
use ClarionApp\ContactsBackend\Controllers\ContactGroupController;
use ClarionApp\ContactsBackend\Controllers\SearchController;

Route::group(['prefix'=>'api/clarion-app/contacts', 'middleware' => 'auth:api'], function () {
    // Contact routes
    Route::resource('contacts', ContactController::class)->except(['create', 'edit']);
    
    // Group routes
    Route::resource('groups', GroupController::class)->except(['create', 'edit']);
    
    // Email routes
    Route::post('/emails', [EmailController::class, 'store']);
    Route::delete('/emails/{id}', [EmailController::class, 'destroy']);
    Route::put('/emails/{id}', [EmailController::class, 'update']);

    // Phone routes
    Route::post('/phones', [PhoneController::class, 'store']);
    Route::delete('/phones/{id}', [PhoneController::class, 'destroy']);
    Route::put('/phones/{id}', [PhoneController::class, 'update']);

    // Contact-Group linking routes
    Route::post('/contacts/{contactId}/groups/{groupId}', [ContactGroupController::class, 'attach']);
    Route::delete('/contacts/{contactId}/groups/{groupId}', [ContactGroupController::class, 'detach']);
    Route::get('/contacts/{contactId}/groups', [ContactGroupController::class, 'listGroups']);

    // Search route
    Route::get('/search', [SearchController::class, 'searchContacts']);
});