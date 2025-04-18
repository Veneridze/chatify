{{-- -------------------- Saved Messages -------------------- --}}
@if($get == 'saved')
    <table class="messenger-list-item {{Auth::user()->channel_id ? 'contact-item' : 'search-item'}}" data-channel="{{ Auth::user()->channel_id }}" data-user="{{ Auth::id() }}">
        <tr data-action="0">
            {{-- Avatar side --}}
            <td>
                <div class="saved-messages avatar av-m">
                    <span class="far fa-bookmark"></span>
                </div>
            </td>
            {{-- center side --}}
            <td>
                <p>@lang('chatify::chatify.saved_messages') <span>@lang('chatify::chatify.saved_messages_owner')</span></p>
                <span>@lang('chatify::chatify.saved_messages_description')</span>
            </td>
        </tr>
    </table>
@endif

{{-- -------------------- Contact User -------------------- --}}
@if($get == 'contact-user' && !!$lastMessage)
    <?php
        $lastMessageBody = mb_convert_encoding($lastMessage->body, 'UTF-8', 'UTF-8');
        $lastMessageBody = strlen($lastMessageBody) > 30 ? mb_substr($lastMessageBody, 0, 30, 'UTF-8') . '..' : $lastMessageBody;
        ?>
    <table class="messenger-list-item contact-item" data-channel="{{ $channel->id }}">
        <tr data-action="0">
            <td style="position: relative">
                @if($user->active_status)
                    <span class="activeStatus" title="@lang('chatify::chatify.online_status')"></span>
                @endif
                <div class="avatar av-m" style="background-image: url('{{ $user->avatar }}');"></div>
            </td>
            <td>
                <p>
                    {{ strlen($user->name) > 12 ? trim(substr($user->name, 0, 12)) . '..' : $user->name }}
                    <span class="contact-item-time" data-time="{{$lastMessage->created_at}}">{{ $lastMessage->timeAgo }}</span>
                </p>
                <span>
                    {!! $lastMessage->from_id == Auth::id()
            ? '<span class="lastMessageIndicator">' . __('chatify::chatify.you_indicator') . '</span>'
            : '' !!}
                    @if($lastMessage->attachment == null)
                        {!! $lastMessageBody !!}
                    @else
                        <span class="fas fa-file"></span> @lang('chatify::chatify.attachment_indicator')
                    @endif
                </span>
                {!! $unseenCounter > 0 ? "<b>" . $unseenCounter . "</b>" : '' !!}
            </td>
        </tr>
    </table>
@endif

{{-- -------------------- Contact Group -------------------- --}}
@if($get == 'contact-group' && !!$lastMessage)
    <?php
        $lastMessageBody = mb_convert_encoding($lastMessage->body, 'UTF-8', 'UTF-8');
        $lastMessageBody = strlen($lastMessageBody) > 30 ? mb_substr($lastMessageBody, 0, 30, 'UTF-8') . '..' : $lastMessageBody;
        ?>
    <table class="messenger-list-item contact-item" data-channel="{{ $channel->id }}">
        <tr data-action="0">
            {{-- Avatar side --}}
            <td style="position: relative">
                <div class="avatar av-m" style="background-image: url('{{ $channel->avatar }}');">
                </div>
            </td>
            {{-- center side --}}
            <td>
                <p>
                    {{ $channel->name }}
                    <span class="contact-item-time" data-time="{{$lastMessage->created_at}}">{{ $lastMessage->timeAgo }}</span>
                </p>
                <span>
                    {!! $lastMessage->from_id == Auth::id()
            ? '<span class="lastMessageIndicator">' . __('chatify::chatify.you_indicator') . '</span>'
            : '<span class="lastMessageIndicator">' . $lastMessage->user_name . __('chatify::chatify.group_message_indicator') . '</span>' !!}
                    @if($lastMessage->attachment == null)
                            {!!
                        $lastMessageBody
                                            !!}
                    @else
                        <span class="fas fa-file"></span> @lang('chatify::chatify.attachment_indicator')
                    @endif
                </span>
                {{-- New messages counter --}}
                {!! $unseenCounter > 0 ? "<b>" . $unseenCounter . "</b>" : '' !!}
            </td>
        </tr>
    </table>
@endif

    <table class="messenger-list-item search-item" data-user="{{ $user->id }}">
        <tr data-action="0">
            {{-- Avatar side --}}
            <td>
                <div class="avatar av-m" style="background-image: url('{{ $user->avatar }}');">
                </div>
            </td>
            {{-- center side --}}
            <td>
                <p>{{ strlen($user->name) > 12 ? trim(substr($user->name, 0, 12)) . '..' : $user->name }}</p>
            </td>
        </tr>
    </table>
@endif

{{-- -------------------- Modal Search Item -------------------- --}}
@if($get == 'user_search_item')
    <table class="user-list-item" data-user="{{ $user->id }}">
        <tr data-action="0">
            {{-- Avatar side --}}
            <td>
                <div class="avatar av-s" style="background-image: url('{{ $user->avatar }}');">
                </div>
            </td>
            {{-- center side --}}
            <td>
                <p>{{ $user->name }}</p>
            </td>
        </tr>
    </table>
@endif

{{-- -------------------- Shared photos Item -------------------- --}}
@if($get == 'sharedPhoto')
    <div class="shared-photo chat-image" style="background-image: url('{{ $image }}')" title="@lang('chatify::chatify.shared_photos_title')"></div>
@endif