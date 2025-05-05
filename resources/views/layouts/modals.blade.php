{{-- ---------------------- Group Channel Modal ---------------------- --}}
<div class="app-modal group-modal" data-name="addGroup">
    <div class="app-modal-container">
        <div class="app-modal-card" data-name="addGroup" data-modal='0'>
            <form id="addGroupForm" action="{{ route('group-chat.create') }}" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="app-modal-header">
                    @lang('chatify::chat.create_group_title')
                </div>
                <div class="app-modal-body">
                    {{-- channel avatar --}}
                    <div class="avatar av-l upload-avatar-preview chatify-d-flex" style="background-image: url('{{ Chatify::getUserWithAvatar(Auth::user())->avatar }}');"></div>
                    <p class="upload-avatar-details">@lang('chatify::chat.avatar_upload_details')</p>
                    {{-- <label class="app-btn a-btn-primary update" style="background-color:{{$messengerColor}}">
                        @lang('chatify::chat.upload_avatar_label')
                        <input class="upload-avatar chatify-d-none" accept="image/*" name="avatar" type="file" />
                    </label> --}}

                    <div class="form-control">
                        <label class="form-label" for="group_name">@lang('chatify::chat.group_name_label')</label>
                        <input class="form-input" type="text" name="group_name" id="group_name" placeholder="@lang('chatify::chat.group_name_placeholder')" required />
                    </div>
                    <div class="form-control">
                        <label class="form-label" for="search">@lang('chatify::chat.select_users_label')</label>
                        <input class="form-input user-search" type="text" name="search" placeholder="@lang('chatify::chat.search_users_placeholder')" />
                    </div>
                    <div class="search-records app-scroll users-list"></div>
                    <div style="margin-top: 1rem; margin-bottom: 2rem">
                        <label class="form-label">@lang('chatify::chat.added_users_label')</label>
                        <div class="added-users app-scroll users-list"></div>
                    </div>
                </div>
                <div class="app-modal-footer">
                    <a href="javascript:void(0)" class="app-btn cancel">@lang('chatify::chat.cancel_button')</a>
                    <input type="submit" class="app-btn a-btn-success update" value="@lang('chatify::chat.save_changes_button')" />
                </div>
            </form>
        </div>
    </div>
</div>

{{-- ---------------------- Delete Group Chat Modal ---------------------- --}}
<div class="app-modal" data-name="delete-group">
    <div class="app-modal-container">
        <div class="app-modal-card" data-name="delete-group" data-modal='0'>
            <div class="app-modal-header">@lang('chatify::chat.delete_group_title')</div>
            <div class="app-modal-body">@lang('chatify::chat.delete_group_warning')</div>
            <div class="app-modal-footer">
                <a href="javascript:void(0)" class="app-btn cancel">@lang('chatify::chat.cancel_button')</a>
                <a href="javascript:void(0)" class="app-btn a-btn-danger delete">@lang('chatify::chat.delete_button')</a>
            </div>
        </div>
    </div>
</div>

{{-- ---------------------- Leave Group Chat Modal ---------------------- --}}
<div class="app-modal" data-name="leave-group">
    <div class="app-modal-container">
        <div class="app-modal-card" data-name="leave-group" data-modal='0'>
            <div class="app-modal-header">@lang('chatify::chat.leave_group_title')</div>
            <div class="app-modal-body">@lang('chatify::chat.leave_group_warning')</div>
            <div class="app-modal-footer">
                <a href="javascript:void(0)" class="app-btn cancel">@lang('chatify::chat.cancel_button')</a>
                <a href="javascript:void(0)" class="app-btn a-btn-danger delete">@lang('chatify::chat.leave_button')</a>
            </div>
        </div>
    </div>
</div>

{{-- ---------------------- Image modal box ---------------------- --}}
<div id="imageModalBox" class="imageModal">
    <span class="imageModal-close" title="@lang('chatify::chat.image_modal_close')">&times;</span>
    <img class="imageModal-content" id="imageModalBoxSrc">
</div>

{{-- ---------------------- Delete Modal ---------------------- --}}
<div class="app-modal" data-name="delete">
    <div class="app-modal-container">
        <div class="app-modal-card" data-name="delete" data-modal='0'>
            <div class="app-modal-header">@lang('chatify::chat.delete_title')</div>
            <div class="app-modal-body">@lang('chatify::chat.delete_warning')</div>
            <div class="app-modal-footer">
                <a href="javascript:void(0)" class="app-btn cancel">@lang('chatify::chat.cancel_button')</a>
                <a href="javascript:void(0)" class="app-btn a-btn-danger delete">@lang('chatify::chat.delete_button')</a>
            </div>
        </div>
    </div>
</div>

{{-- ---------------------- Settings Modal ---------------------- --}}
<div class="app-modal" data-name="settings">
    <div class="app-modal-container">
        <div class="app-modal-card" data-name="settings" data-modal='0'>
            <form id="update-settings" action="{{ route('avatar.update') }}" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="app-modal-body">
                    <div class="avatar av-l upload-avatar-preview chatify-d-flex" style="background-image: url('{{ Chatify::getUserWithAvatar(Auth::user())->avatar }}');"></div>
                    <p class="upload-avatar-details">@lang('chatify::chat.avatar_upload_details')</p>
                    <label class="app-btn a-btn-primary update" style="background-color:{{$messengerColor}}">
                        @lang('chatify::chat.upload_avatar_label')
                        <input class="upload-avatar chatify-d-none" accept="image/*" name="avatar" type="file" />
                    </label>

                    <p class="divider"></p>
                    <p class="app-modal-header">@lang('chatify::chat.dark_mode_label')
                        <span class="{{ Auth::user()->dark_mode > 0 ? 'fas' : 'far' }} fa-moon dark-mode-switch" data-mode="{{ Auth::user()->dark_mode > 0 ? 1 : 0 }}"></span>
                    </p>

                    <p class="divider"></p>
                    <div class="update-messengerColor">
                        @foreach (config('chatify.colors') as $color)
                            <span style="background-color: {{ $color}}" data-color="{{$color}}" class="color-btn"></span>
                            @if (($loop->index + 1) % 5 == 0)
                                <br />
                            @endif
                        @endforeach
                    </div>
                </div>
                <div class="app-modal-footer">
                    <a href="javascript:void(0)" class="app-btn cancel">@lang('chatify::chat.cancel_button')</a>
                    <input type="submit" class="app-btn a-btn-success update" value="@lang('chatify::chat.save_changes_button')" />
                </div>
            </form>
        </div>
    </div>
</div>