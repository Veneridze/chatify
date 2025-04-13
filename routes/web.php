<?php

use Chatify\Http\Controllers\Api\MessagesController;
use Illuminate\Support\Facades\Route;

/**
 * Authentication for pusher private channels
 */


Route::prefix(config('chatify.routes.prefix'))->middleware(config('chatify.routes.middleware'))->group(function () {


    Route::post('/chat/auth', [MessagesController::class, 'pusherAuth'])->name('api.pusher.auth');

    /**
     *  Fetch info for specific id [user/group]
     */
    Route::post('/idInfo', [MessagesController::class, 'idFetchData'])->name('api.idInfo');

    /**
     * Send message route
     */
    Route::post('/sendMessage', [MessagesController::class, 'send'])->name('api.send.message');

    /**
     * Fetch messages
     */
    Route::post('/fetchMessages', [MessagesController::class, 'fetch'])->name('api.fetch.messages');

    /**
     * Download attachments route to create a downloadable links
     */
    Route::get('/download/{fileName}', [MessagesController::class, 'download'])->name('api.' . config('chatify.attachments.download_route_name'));

    /**
     * Make messages as seen
     */
    Route::post('/makeSeen', [MessagesController::class, 'seen'])->name('api.messages.seen');

    /**
     * Get contacts
     */
    Route::get('/getContacts', [MessagesController::class, 'getContacts'])->name('api.contacts.get');

    /**
     * Star in favorite list
     */
    Route::post('/star', [MessagesController::class, 'favorite'])->name('api.star');

    /**
     * get favorites list
     */
    Route::post('/favorites', [MessagesController::class, 'getFavorites'])->name('api.favorites');

    /**
     * Search in messenger
     */
    Route::get('/search', [MessagesController::class, 'search'])->name('api.search');

    /**
     * Get shared photos
     */
    Route::post('/shared', [MessagesController::class, 'sharedPhotos'])->name('api.shared');

    /**
     * Delete Conversation
     */
    Route::post('/deleteConversation', [MessagesController::class, 'deleteConversation'])->name('api.conversation.delete');

    /**
     * Update settings
     */
    Route::post('/updateSettings', [MessagesController::class, 'updateSettings'])->name('api.avatar.update');

    /**
     * Set active status
     */
    Route::post('/setActiveStatus', [MessagesController::class, 'setActiveStatus'])->name('api.activeStatus.set');
});