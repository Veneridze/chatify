<?php

use Chatify\Http\Controllers\MessagesController;
use Illuminate\Support\Facades\Route;

/**
 * Authentication for pusher private channels
 */


Route::controller(MessagesController::class)->prefix(config('chatify.routes.prefix'))->middleware(config('chatify.routes.middleware'))->group(function () {
    /*
     * This is the main app route [Chatify Messenger]
     */
    Route::get('/', 'index')->name(config('chatify.routes.prefix'));

    /**
     *  Fetch info for specific id [user/group]
     */
    Route::post('/idInfo', 'idFetchData');

    /**
     * Send message route
     */
    Route::post('/sendMessage', 'send')->name('send.message');

    /**
     * Fetch messages
     */
    Route::post('/fetchMessages', 'fetch')->name('fetch.messages');

    /**
     * Download attachments route to create a downloadable links
     */
    Route::get('/download/{fileName}', 'download')->name(config('chatify.attachments.download_route_name'));

    /**
     * Authentication for pusher private channels
     */
    Route::post('/chat/auth', 'pusherAuth')->name('pusher.auth');

    /**
     * Make messages as seen
     */
    Route::post('/makeSeen', 'seen')->name('messages.seen');

    /**
     * Get contacts / list of channels
     */
    Route::get('/getContacts', 'getContacts')->name('contacts.get');

    /**
     * Update contact item data
     */
    Route::post('/updateContacts', 'updateContactItem')->name('contacts.update');

    /**
     * Get channel_id by user_id
     */
    Route::post('/get-channel-id', 'getChannelId')->name('get-channel-id');

    /**
     * Star in favorite list
     */
    Route::post('/star', 'favorite')->name('star');

    /**
     * get favorites list
     */
    Route::post('/favorites', 'getFavorites')->name('favorites');

    /**
     * Search in messenger
     */
    Route::get('/search', 'search')->name('search');

    /**
     * Get shared photos
     */
    Route::post('/shared', 'sharedPhotos')->name('shared');

    /**
     * Delete Conversation
     */
    Route::post('/deleteConversation', 'deleteConversation')->name('conversation.delete');

    /**
     * Delete Message
     */
    Route::post('/deleteMessage', 'deleteMessage')->name('message.delete');

    /**
     * Update setting
     */
    Route::post('/updateSettings', 'updateSettings')->name('avatar.update');

    /**
     * Set active status
     */
    Route::post('/setActiveStatus', 'setActiveStatus')->name('activeStatus.set');

    /**
     * Search users for group modal
     */
    Route::get('/search-users', 'searchUsers')->name('group.search.users');

    /**
     * Group Chat
     */
    Route::name('group-chat.')->prefix('group-chat')->group(function () {
        Route::post('/create', 'createGroupChat')->name('create');
        Route::post('/delete', 'deleteGroupChat')->name('delete');
        Route::post('/leave', 'leaveGroupChat')->name('leave');
    });




    /**
     * Channel id
     */
    Route::get('/{channel_id}', 'index')->name('channel_id');
});