@include('Chatify::layouts.headLinks')
<div class="messenger">
    {{-- ----------------------Users/Groups lists side---------------------- --}}
    <div class="messenger-listView {{ !!$channel_id ? 'conversation-active' : '' }}">
        {{-- Header and search bar --}}
        <div class="m-header">
            <nav>
                <a href="#"><i class="fas fa-inbox"></i> <span class="messenger-headTitle">@lang('chatify.messages_title')</span> </a>
                {{-- header buttons --}}
                <nav class="m-header-right">
                    <a href="#" title="@lang('chatify.groups_button')"><i class="fas fa-users group-btn"></i></a>
                    <a href="#" title="@lang('chatify.settings_button')"><i class="fas fa-cog settings-btn"></i></a>
                    <a href="#" class="listView-x" title="@lang('chatify.close_button')"><i class="fas fa-times"></i></a>
                </nav>
            </nav>
            {{-- Search input --}}
            <input type="text" class="messenger-search" placeholder="@lang('chatify.search_placeholder')" />
        </div>
        {{-- tabs and lists --}}
        <div class="m-body contacts-container">
            {{-- ---------------- [ User Tab ] ---------------- --}}
            <div class="show messenger-tab users-tab app-scroll" data-view="users">
                {{-- Favorites --}}
                <div class="favorites-section">
                    <p class="messenger-title"><span>@lang('chatify.favorites_title')</span></p>
                    <div class="messenger-favorites app-scroll-hidden"></div>
                </div>
                {{-- Saved Messages --}}
                <p class="messenger-title"><span>@lang('chatify.your_space_title')</span></p>
                {!! view('Chatify::layouts.listItem', ['get' => 'saved']) !!}
                {{-- Contact --}}
                <p class="messenger-title"><span>@lang('chatify.all_messages_title')</span></p>
                <div class="listOfContacts" style="width: 100%;height: calc(100% - 272px);position: relative;"></div>
            </div>
            {{-- ---------------- [ Search Tab ] ---------------- --}}
            <div class="messenger-tab search-tab app-scroll" data-view="search">
                <p class="messenger-title"><span>@lang('chatify.search_title')</span></p>
                <div class="search-records">
                    <p class="message-hint center-el"><span>@lang('chatify.search_hint')</span></p>
                </div>
            </div>
        </div>
    </div>

    {{-- ----------------------Messaging side---------------------- --}}
    <div class="messenger-messagingView">
        <div class="m-header m-header-messaging">
            <nav class="chatify-d-flex chatify-justify-content-between chatify-align-items-center">
                <div class="chatify-d-flex chatify-justify-content-between chatify-align-items-center">
                    <a href="#" class="show-listView" title="@lang('chatify.back_button')"><i class="fas fa-arrow-left"></i></a>
                    <div class="avatar av-s header-avatar" style="margin: 0px 10px; margin-top: -5px; margin-bottom: -5px;"></div>
                    <a href="#" class="user-name">{{ config('chatify.name') }}</a>
                </div>
                <nav class="m-header-right">
                    <a href="#" class="add-to-favorite" title="@lang('chatify.add_to_favorites')"><i class="fas fa-star"></i></a>
                    <a href="/" title="@lang('chatify.home_button')"><i class="fas fa-home"></i></a>
                    <a href="#" class="show-infoSide" title="@lang('chatify.info_button')"><i class="fas fa-info-circle"></i></a>
                </nav>
            </nav>
            <div class="internet-connection">
                <span class="ic-connected">@lang('chatify.connected')</span>
                <span class="ic-connecting">@lang('chatify.connecting')</span>
                <span class="ic-noInternet">@lang('chatify.no_internet')</span>
            </div>
        </div>

        <div class="m-body messages-container app-scroll">
            <div class="messages">
                <p class="message-hint center-el"><span>@lang('chatify.select_chat_hint')</span></p>
            </div>
            <div class="typing-indicator">
                <div class="message-card typing">
                    <div class="message">
                        <span class="typing-dots">
                            <span class="dot dot-1"></span>
                            <span class="dot dot-2"></span>
                            <span class="dot dot-3"></span>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        {{-- Send Message Form --}}
        @include('Chatify::layouts.sendForm')
    </div>

    {{-- ---------------------- Info side ---------------------- --}}
    <div class="messenger-infoView app-scroll">
        <nav>
            <p></p>
            <a href="#" title="@lang('chatify.info_close_button')"><i class="fas fa-times"></i></a>
        </nav>
    </div>
</div>

@include('Chatify::layouts.modals')
@include('Chatify::layouts.footerLinks')