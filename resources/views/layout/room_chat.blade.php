    <div id="chat-box" class="card-body overflow-auto pt-0" data-mdb-perfect-scrollbar="true"
        style="position: relative; max-height: calc(100vh - 16px);">
        <div
            style="max-height: 46px; max-width: 100%; background-color: #fff; display: fixed; position: sticky; top: 0; padding-top: 12px; padding-bottom: 8px; border-bottom: 1px solid #ccc">
            <p style="line-height: 26px;" id="nama_member">{{ $member_name ?? $member_no_telpon }}</p>
        </div>
        {{-- @include('layout.room_chat') --}}
        @foreach ($chats as $chat)
            @php
                $fonnte_chat_id = json_decode($chat->res_detail, true)['id'][0] ?? '';
                $status = json_decode($chat->res_detail, true)['status'] ?? '';
            @endphp

            @if ($loop->first)
                @if ($chat->pengirim == $member_no_telpon)
                    <!-- Untuk Member -->
                    <div class="d-flex flex-row justify-content-start mt-2 mb-1">
                        <div>
                            <div class="small p-2 ms-3 mb-1 rounded-3 d-flex gap-3 align-items-end"
                                style="background-color: #f5f6f7;">
                                <p style="margin-bottom: 0px;">{{ $chat->text }}</p>
                                <p class="small rounded-3 text-muted" style="margin-bottom: 0px; font-size: 10px;">
                                    {{ $chat->created_at->format('H:i') }}</p>
                            </div>
                        </div>
                    </div>
                @else
                    <!-- Untuk Pegawai -->
                    <div class="d-flex flex-row justify-content-end mb-1 mt-2">
                        <div>
                            <div class="small p-2 me-3 mb-1 text-white rounded-3 d-flex align-items-end gap-3"
                                style="background-color: #f5f6f7;">
                                <p style="margin-bottom: 0px; color: #4F4F4F;">{{ $chat->text }}</p>
                                <div class="d-flex align-items-baseline gap-1">
                                    <p class="small rounded-3 text-muted" style="margin-bottom: 0px; font-size: 10px;">
                                        {{ $chat->created_at->format('H:i') }}</p>
                                    <div id="{{ $fonnte_chat_id }}">
                                        @if ($status == 'true')
                                            <i class="fa-regular fa-clock fa-xs" style="color: rgba(0, 0, 0, .7);"></i>
                                        @elseif ($chat->state == 'sent' && $status == 'sent')
                                            <i class="fa-solid fa-check fa-xs" style="color: rgba(0, 0, 0, .7);"></i>
                                        @elseif($chat->state == 'delivered' && $status == 'sent')
                                            <i class="fa-solid fa-check-double fa-xs"
                                                style="color: rgba(0, 0, 0, .7);"></i>
                                        @elseif($chat->state == 'read' && $status == 'sent')
                                            <i class="fa-solid fa-check-double fa-xs" style="color: #3B71CA;"></i>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @else
                @if ($chat->pengirim == $member_no_telpon)
                    <!-- Untuk Member -->
                    <div class="d-flex flex-row justify-content-start mb-1">
                        <div>
                            <div
                                class="small p-2 ms-3 mb-1 rounded-3 d-flex gap-3 align-items-end bg-primary text-white">
                                <p style="margin-bottom: 0px;">{{ $chat->text }}</p>
                                <p class="small rounded-3 text-white" style="margin-bottom: 0px; font-size: 10px;">
                                    {{ $chat->created_at->format('H:i') }}</p>
                            </div>
                        </div>
                    </div>
                @else
                    <!-- Untuk Pegawai -->
                    <div class="d-flex flex-row justify-content-end mb-4">
                        <div>
                            <div class="small p-2 me-3 mb-1 text-white rounded-3 d-flex align-items-end gap-3"
                                style="background-color: #f5f6f7;">
                                <p style="margin-bottom: 0px; color: #4F4F4F;">{{ $chat->text }}</p>
                                <div class="d-flex align-items-baseline gap-1">
                                    <p class="small rounded-3 text-muted" style="margin-bottom: 0px; font-size: 10px;">
                                        {{ $chat->created_at->format('H:i') }}</p>
                                    <div id="{{ $fonnte_chat_id }}">
                                        @if ($status == 'true')
                                            <i class="fa-regular fa-clock fa-xs" style="color: rgba(0, 0, 0, .7);"></i>
                                        @elseif ($chat->state == 'sent' && $status == 'sent')
                                            <i class="fa-solid fa-check fa-xs" style="color: rgba(0, 0, 0, .7);"></i>
                                        @elseif($chat->state == 'delivered' && $status == 'sent')
                                            <i class="fa-solid fa-check-double fa-xs"
                                                style="color: rgba(0, 0, 0, .7);"></i>
                                        @elseif($chat->state == 'read' && $status == 'sent')
                                            <i class="fa-solid fa-check-double fa-xs" style="color: #3B71CA;"></i>
                                        @endif
                                    </div>
                                    {{-- <i class="fa-solid fa-check fa-xs" style="color: rgba(0, 0, 0, .7);"></i> --}}
                                    {{-- <i class="fa-solid fa-check-double fa-xs" style="color: rgba(0, 0, 0, .7);"></i> --}}
                                    {{-- <i class="fa-solid fa-check-double fa-xs" style="color: #3B71CA;"></i> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endif
        @endforeach

    </div>
    <div id="chat-footer" class="card-footer text-muted d-flex justify-content-start align-items-center p-3">
        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3-bg.webp" alt="avatar 3"
            style="width: 40px; height: 100%;">
        @csrf
        <input type="text" class="form-control form-control-lg" id="exampleFormControlInput1"
            placeholder="Type message" name="message" autocomplete="off">
        <a class="ms-1 text-muted" href="#!"><i class="fas fa-paperclip"></i></a>
        <a class="ms-3 text-muted" href="#!"><i class="fas fa-smile"></i></a>
        <a class="ms-3" href="#" id="send-btn"><i class="fas fa-paper-plane"></i></a>
    </div>


    <script>
        function rerender_room_chat(phone_number) {
            $.ajax({
                type: "GET",
                url: '{{ route('get_chat_by_phone_number') }}',
                data: {
                    'no_telpon': phone_number
                },
                success: function(response) {
                    $('#chat2').html(response);
                    var chatBox = $('#chat-box');
                    chatBox.scrollTop(chatBox.prop('scrollHeight'));
                    $('#chat-first-notif').addClass('d-none');
                }
            });
        }

        $(document).ready(function() {
            $(document).on('click', '.div-pegawai', function() {
                console.log($(this.id - pesan).data('msg-id'))
            });
        });

        $('input[name="message"]').keyup(function(event) {
            if (event.keyCode === 13) {
                $('#send-btn').click();
            }
        });

        $('#send-btn').on('click', function() {
            let message = $('input[name="message"]').val();

            $.ajax({
                type: "POST",
                url: '{{ route('send_message') }}',
                data: {
                    no_telpon: '{{ $member_no_telpon }}',
                    message
                },
                success: function({
                    response,
                    message
                }) {
                    let res = JSON.parse(response)
                    rerender_room_chat(res.target[0])
                }
            });

        });
    </script>
