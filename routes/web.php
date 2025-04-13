<?php

use Chatify\Http\Controllers\MessagesController;
use Illuminate\Support\Facades\Route;

/**
 * Authentication for pusher private channels
 */


Route::prefix(config('chatify.routes.prefix'))->middleware(config('chatify.routes.middleware'))->group(function () {
    /*
     * This is the main app route [Chatify Messenger]
     */
    Route::get('/', [MessagesController::class, 'index'])->name(config('chatify.routes.prefix'));

    /**
     *  Fetch info for specific id [user/group]
     */
    Route::post('/idInfo', [MessagesController::class, 'idFetchData']);

    /**
     * Send message route
     */
    Route::post('/sendMessage', [MessagesController::class, 'send'])->name('send.message');

    /**
     * Fetch messages
     */
    Route::post('/fetchMessages', [MessagesController::class, 'fetch'])->name('fetch.messages');

    /**
     * Download attachments route to create a downloadable links
     */
    Route::get('/download/{fileName}', [MessagesController::class, 'download'])->name(config('chatify.attachments.download_route_name'));

    /**
     * Authentication for pusher private channels
     */
    Route::post('/chat/auth', [MessagesController::class, 'pusherAuth'])->name('pusher.auth');

    /**
     * Make messages as seen
     */
    Route::post('/makeSeen', [MessagesController::class, 'seen'])->name('messages.seen');

    /**
     * Get contacts / list of channels
     */
    Route::get('/getContacts', [MessagesController::class, 'getContacts'])->name('contacts.get');

    /**
     * Update contact item data
     */
    Route::post('/updateContacts', [MessagesController::class, 'updateContactItem'])->name('contacts.update');

    /**
     * Get channel_id by user_id
     */
    Route::post('/get-channel-id', [MessagesController::class, 'getChannelId'])->name('get-channel-id');

    /**
     * Star in favorite list
     */
    Route::post('/star', [MessagesController::class, 'favorite'])->name('star');

    /**
     * get favorites list
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
     * Delete Message
     */
    Route::post('/deleteMessage', [MessagesController::class, 'deleteMessage'])->name('message.delete');

    /**
     * Update setting
     */
    Route::post('/updateSettings', [MessagesController::class, 'updateSettings'])->name('avatar.update');

    /**
     * Set active status
     */
    Route::post('/setActiveStatus', [MessagesController::class, 'setActiveStatus'])->name('activeStatus.set');

    /**
     * Search users for group modal
     */
    Route::get('/search-users', [MessagesController::class, 'searchUsers'])->name('group.search.users');

    /**
     * Group Chat
     */
    Route::name('group-chat.')->prefix('group-chat')->group(function () {
        Route::post('/create', [MessagesController::class, 'createGroupChat'])->name('create');
        Route::post('/delete', [MessagesController::class, 'deleteGroupChat'])->name('delete');
        Route::post('/leave', [MessagesController::class, 'leaveGroupChat'])->name('delete');
    });




    /**
     * Channel id
     */
    Route::get('/{channel_id}', [MessagesController::class, 'index'])->name('channel_id');
});