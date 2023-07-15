    <div id="chat-box" class="card-body overflow-auto pt-0" data-mdb-perfect-scrollbar="true"
        style="position: relative; max-height: calc(100vh - 16px);">
        @include('layout.chat_box_content')

    </div>
    <div id="chat-footer" class="card-footer text-muted d-flex justify-content-start align-items-center p-3">
        @csrf
        <input type="text" class="form-control form-control-lg" id="exampleFormControlInput1" placeholder="Type message"
            name="message" autocomplete="off">
        <a class="ms-1 text-muted" href="#!"><i class="fas fa-paperclip"></i></a>
        <a class="ms-3 text-muted" href="#!"><i class="fas fa-smile"></i></a>
        <a class="ms-3" href="#" id="send-btn"><i class="fas fa-paper-plane"></i></a>
    </div>


    <script>
        function rerender_room_chat_box(phone_number) {
            $.ajax({
                type: "GET",
                url: '{{ route('get_chat_box_by_phone_number') }}',
                data: {
                    'no_telpon': phone_number
                },
                success: function(response) {
                    $('#chat-box').html(response);
                    var chatBox = $('#chat-box');
                    chatBox.scrollTop(chatBox.prop('scrollHeight'));
                    $('#chat-first-notif').addClass('d-none');
                }
            });
        }

        $('input[name="message"]').keyup(function(event) {
            if (event.keyCode === 13) {
                $('#send-btn').click();
            }
        });

        $('#send-btn').on('click', function() {
            let message = $('input[name="message"]').val();
            $('input[name="message"]').val('');
            const date = new Date();
            let nowTime = `${date.getHours()}:${date.getMinutes()}`;

            let bubble_chat_pegawai = `<div class="d-flex flex-row justify-content-end mb-4">
                        <div>
                            <div class="small p-2 me-3 mb-1 text-white rounded-3 d-flex align-items-end gap-3"
                                style="background-color: #f5f6f7;">
                                <p style="margin-bottom: 0px; color: #4F4F4F; max-width: 300px;">${message}</p>
                                <div class="d-flex align-items-baseline gap-1">
                                    <p class="small rounded-3 text-muted" style="margin-bottom: 0px; font-size: 10px;">${nowTime}</p>
                                    <div id="">
                                        <i class="fa-regular fa-clock fa-xs" style="color: rgba(0, 0, 0, .7);"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>`

            $('#chat-box').append(bubble_chat_pegawai);
            var chatBox = $('#chat-box');
            chatBox.scrollTop(chatBox.prop('scrollHeight'));
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
                    rerender_room_chat_box(res.target[0])
                    if ("{{ Auth::user()->username }}" === 'staff') {
                        $.ajax({
                            type: "GET",
                            url: '{{ route('list_chat_nonmember.update') }}',
                            data: "",
                            success: function(res) {
                                // console.log(res)
                                $('#list-kontak-member').html(res);
                            },
                            error: (err) => {
                                console.log(err)
                            }
                        });
                    } else {
                        $.ajax({
                            type: "GET",
                            url: '{{ route('list_chat.update') }}',
                            data: "",
                            success: function(res) {
                                // console.log(res)
                                $('#list-kontak-member').html(res);
                            },
                            error: (err) => {
                                console.log(err)
                            }
                        });
                    }
                }
            });

        });
    </script>
