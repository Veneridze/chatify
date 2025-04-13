<?php

use Chatify\Http\Controllers\Api\MessagesController;
use Illuminate\Support\Facades\Route;


Route::name('api.')->prefix(config('chatify.api_routes.prefix'))->middleware(config('chatify.api_routes.middleware'))->group(function () {
    /**
     * Authentication for pusher private channels
     */
    Route::post('/chat/auth', [MessagesController::class, 'pusherAuth'])->name('pusher.auth');

    /**
     * Fetch info for specific id [user/group]
     */
    Route::post('/idInfo', [MessagesController::class, 'idFetchData'])->name('idInfo');

    /**
     * Send message route
     */
    Route::post('/sendMessage', [MessagesController::class, 'send'])->name('send.message');

    /**
     * Fetch messages
     */
    Route::post('/fetchMessages', [MessagesController::class, 'fetch'])->name('fetch.messages');

    /**
     * Download attachments route to create downloadable links
     */
    Route::get('/download/{fileName}', [MessagesController::class, 'download'])
        ->name(config('chatify.attachments.download_route_name'));

    /**
     * Make messages as seen
     */
    Route::post('/makeSeen', [MessagesController::class, 'seen'])->name('messages.seen');

    /**
     * Get contacts
     */
    Route::get('/getContacts', [MessagesController::class, 'getContacts'])->name('contacts.get');

    /**
     * Star in favorite list
     */
    Route::post('/star', [MessagesController::class, 'favorite'])->name('star');

    /**
     * Get favorites list
     */
    Route::post('/favorites', [MessagesController::class, 'getFavorites'])->name('favorites');

    /**
     * Search in messenger
     */
    Route::get('/search', [MessagesController::class, 'search'])->name('search');

    /**
     * Get shared photos
     */
    Route::post('/shared', [MessagesController::class, 'sharedPhotos'])->name('shared');

    /**
     * Delete Conversation
     */
    Route::post('/deleteConversation', [MessagesController::class, 'deleteConversation'])->name('conversation.delete');

    /**
     * Update settings
     */
    Route::post('/updateSettings', [MessagesController::class, 'updateSettings'])->name('avatar.update');

    /**
     * Set active status
     */
    Route::post('/setActiveStatus', [MessagesController::class, 'setActiveStatus'])->name('activeStatus.set');


});