<div class="messenger-sendCard">
    <form id="message-form" method="POST" action="{{ route('send.message') }}" enctype="multipart/form-data">
        @csrf
        <label title="@lang('chat.attach_file_tooltip')">
            <span class="fas fa-plus-circle"></span>
            <input disabled='disabled' type="file" class="upload-attachment" name="file" accept=".{{implode(', .', config('chatify.attachments.allowed_images'))}}, .{{implode(', .', config('chatify.attachments.allowed_files'))}}" title="@lang('chat.allowed_files_info', ['types' => implode(', ', array_merge(config('chatify.attachments.allowed_images'), config('chatify.attachments.allowed_files')))])" />
        </label>
        <button class="emoji-button" title="@lang('chat.emoji_picker_tooltip')">
            <span class="fas fa-smile"></span>
        </button>
        <textarea readonly='readonly' name="message" class="m-send app-scroll" placeholder="@lang('chat.send_message_placeholder')"></textarea>
        <button disabled='disabled' class="send-button" title="@lang('chat.send_button_tooltip')">
            <span class="fas fa-paper-plane"></span>
        </button>
    </form>
</div>