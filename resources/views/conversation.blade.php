@extends('layouts.hometemplate')

@section('content')


    <div class="row chat-row">
        <div class="col-md-3">
            <div class="users">
                <h5>Users</h5>

                <ul class="list-group list-chat-item">
                    @if($users->count())
                        @foreach($users as $user)
                            <li class="chat-user-list
                                @if($user->id == $friendInfo->id) active @endif">
                                <a href="{{ route('message.conversation', $user->id) }}">
                                    <div class="chat-image">
                                        <img class="rounded-circle w-100" src="{{$user->profile->profileImage()}}"
                                             style="max-width: 40px">
                                        <i class="fa fa-circle user-status-icon user-icon-{{ $user->id }}"
                                           title="away"></i>
                                    </div>

                                    <div class="chat-name font-weight-bold">
                                        {{ $user->name }}
                                    </div>
                                </a>
                            </li>
                        @endforeach
                    @endif
                </ul>
            </div>
        </div>

        <div class="col-md-9 chat-section">
            <div class="chat-header">
                <div class="chat-image">
                    <img class="rounded-circle w-100" src="{{$friendInfo->profile->profileImage()}}"
                         style="max-width: 40px">
                    {{ $friendInfo->name }}
                </div>

                <div class="chat-name font-weight-bold">
                    <i class="fa fa-circle user-status-head" title="away"
                       id="userStatusHead{{$friendInfo->id}}"></i>
                </div>
            </div>

            <div class="chat-body" id="chatBody">
                <div class="message-listing" id="messageWrapper">
                    <div class="message-listing" id="messageWrapper">
                        <div class="row message align-items-center mb-2">
                            <div class="col-md-12 user-info">
                                <div class="chat-image">
                                    <img class="rounded-circle w-100" src="{{$friendInfo->profile->profileImage()}}"
                                         style="max-width: 40px">
                                </div>

                                <div class="chat-name font-weight-bold">
                                    Name<span class="small time text-grey-500"
                                              title="2021-03-26 17:00 PM"> 17:00 PM </span>

                                </div>

                            </div>
                            <div class="col-md-12 message-content">
                                <div class="message-text">
                                    Message here
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="chat-box">
                <div class="chat-input bg-white" id="chatInput" contenteditable="">

                </div>

                <div class="chat-input-toolbar">
                    <button title="Add File" class="btn btn-light btn-sm btn-file-upload">
                        <i class="fa fa-paperclip"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection


@push('scripts')
    <script>
        $(function () {
            let $chatInput = $(".chat-input");
            let $chatInputToolbar = $(".chat-input-toolbar");
            let $chatBody = $(".chat-body")

            let user_id = "{{auth()->user()->id}}";
            let ip_address = '127.0.0.1';
            let socket_port = '8005';
            let socket = io(ip_address + ':' + socket_port);
            let friendId = "{{$friendInfo->id}}"

            socket.on('connect', function () {
                socket.emit('user_connected', user_id);
            });

            socket.on('updateUserStatus', (data) => {
                /*
                                let $userStatusIcon = $(".user-status-icon");
                                $userStatusIcon.removeClass('bg-success');
                                $userStatusIcon.attr('title', 'Away');
                                console.log(".user-icon-" + key);*/

                $.each(data, function (key, val) {
                    if (val !== null && val !== 0) {
                        let $userIcon = $(".user-icon-" + key);
                        $userIcon.addClass('bg-success');
                        $userIcon.attr('title', 'Online');
                        console.log(".user-icon-" + key);
                    }
                });
            });
            $chatInput.keypress(function (e) {
                let message = $(this).html();
                if (e.which === 13 && !e.shiftKey) {
                    $chatInput.html("");
                    sendMessage(message);
                    return false;
                }
            });

            function sendMessage(message) {
                let url = "{{route('message.send-message')}}"
                let form = $(this);
                let formData = new FormData();
                let token = "{{csrf_token()}}"

                formData.append('message', message);
                formData.append('_token', token);
                formData.append('receiver_id', friendId);

                $.ajax({
                    url: url,
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    dataType: 'JSON',
                    success: function (response) {
                        if (response.success) {
                            console.log(response.data);
                        }
                    }
                });
            }
        });
    </script>
@endpush

