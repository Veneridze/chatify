<div class="messenger-sendCard">
    <form id="message-form" method="POST" action="{{ route('send.message') }}" enctype="multipart/form-data">
        @csrf
        <label title="@lang('chatify::chat.attach_file_tooltip')">
            <span class="fas fa-plus-circle"></span>
            <input disabled='disabled' type="file" class="upload-attachment" name="file" accept=".{{implode(', .', config('chatify.attachments.allowed_images'))}}, .{{implode(', .', config('chatify.attachments.allowed_files'))}}" title="@lang('chatify::chat.allowed_files_info', ['types' => implode(', ', array_merge(config('chatify.attachments.allowed_images'), config('chatify.attachments.allowed_files')))])" />
        </label>
        <button class="emoji-button" title="@lang('chatify::chat.emoji_picker_tooltip')">
            <span class="fas fa-smile"></span>
        </button>
        <textarea readonly='readonly' name="message" class="m-send app-scroll" placeholder="@lang('chatify::chat.send_message_placeholder')"></textarea>
        <button disabled='disabled' class="send-button" title="@lang('chatify::chat.send_button_tooltip')">
            <span class="fas fa-paper-plane"></span>
        </button>
    </form>
</div>