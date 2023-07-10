@extends('layout.main')
@section('content')
    {{-- <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Members /</span> Chats
    </h4> --}}
    <div class="row">
        <!-- List Chat Dengan Member -->
        <div class="col-md-4 col-sm-4">
            <div class="card overflow-hidden mb-4" style="max-height: calc(100vh - 128px); min-height: calc(100vh - 128px);">
                <h5 class="card-header" style="padding-bottom: 12px;" id="test-btn">Chat</h5>
                <div class="card-body" id="vertical-example">
                    <div class="col-lg-12">
                        <div class="demo-inline-spacing">
                            <div class="input-group rounded mb-3">
                                <input id="search-field" type="search" class="form-control rounded" placeholder="Search"
                                    aria-label="Search" aria-describedby="search-addon"
                                    style="border-top: none; border-left: none; border-right: none;" />
                                <span class="input-group-text border-0" id="search-addon">
                                    <i class="fas fa-search"></i>
                                </span>
                            </div>
                            <div class="list-group" id="list-kontak-member">
                                @if (Auth::user()->username != 'staff')
                                    @include('list_chat')
                                @else
                                    @include('list_chat_non_member')
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!--/ List Chat Dengan Member -->

        <!-- Room Chat -->
        <div class="card col-md-8" id="chat2" style="max-height: calc(100vh - 128px);">
            {{-- <div id="chat-box" class="d-none card-body overflow-auto pt-0" data-mdb-perfect-scrollbar="true"
                style="position: relative; height: 400px">
                <div
                    style="max-height: 46px; max-width: 100%; background-color: #fff; display: fixed; position: sticky; top: 0; padding-top: 12px; padding-bottom: 8px; border-bottom: 1px solid #ccc">
                    <p style="line-height: 26px;" id="nama_member"></p>
                </div>
            </div>
            <div id="chat-footer" class="d-none card-footer text-muted d-flex justify-content-start align-items-center p-3">
                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3-bg.webp" alt="avatar 3"
                    style="width: 40px; height: 100%;">
                <input type="text" class="form-control form-control-lg" id="exampleFormControlInput1"
                    placeholder="Type message">
                <a class="ms-1 text-muted" href="#!"><i class="fas fa-paperclip"></i></a>
                <a class="ms-3 text-muted" href="#!"><i class="fas fa-smile"></i></a>
                <a class="ms-3" href="#!"><i class="fas fa-paper-plane"></i></a>
            </div> --}}
            <div id="chat-first-notif" class="d-flex justify-content-center align-items-center"
                style="height: 100%; padding: 0px 64px;">
                <p class="text-center text-muted">Mulailah berkomunikasi dengan member apotek secara efisien dan efektif.
                    Anda
                    dapat memberikan panduan dosis obat, menjawab pertanyaan, atau memberikan rekomendasi produk dengan
                    mudah
                    dan cepat.</p>
            </div>
        </div>

        <!--/ Room Chat -->
    </div>
    <script>
        $(document).ready(function() {

            var previousValue = $('#search-field').val();
            var delayTimer;

            $('#search-field').on('input', function() {
                clearTimeout(delayTimer); // Menghapus timeout sebelumnya
                var currentValue = $(this).val();
                if (currentValue !== previousValue) {

                    delayTimer = setTimeout(function() {
                        console.log('call ajax')

                        if ("{{ Auth::user()->username }}" === 'staff') {
                            $.ajax({
                                type: "GET",
                                url: '{{ route('chat.search_nonmember') }}',
                                data: {
                                    value: currentValue
                                },
                                success: function(response) {
                                    // console.log("res:" + response)
                                    // console.log(response)
                                    $('#list-kontak-member').html(response);
                                }
                            });
                        } else {
                            $.ajax({
                                type: "GET",
                                url: '{{ route('chat.search') }}',
                                data: {
                                    value: currentValue
                                },
                                success: function(response) {
                                    // console.log("res:" + response)
                                    console.log(response)
                                    $('#list-kontak-member').html(response);
                                }
                            });
                        }
                    }, 500);
                }

                previousValue = currentValue;
            });

            function submitForm() {
                $('#chat2').submit();
                console.log('submitted')
            }

            $(document).one('click', '.list-chat-member', function() {
                $('#chat-box').removeClass('d-none');
                $('#chat-footer').removeClass('d-none');
                $('#chat-first-notif').addClass('d-none');
            });

            $('#test-btn').on('click', function() {
                $.ajax({
                    type: "GET",
                    url: '{{ route('chat.index') }}',
                    success: function(response) {
                        // console.log(response)
                    }
                });
            });


        });

        $('#send-btn').ready(function() {
            $('#send-btn').on('click', function() {
                console.log('in')
            });
        });
    </script>
@endsection

@section('websocket_scripts')
    <script>
        $(document).ready(function() {
            Echo.channel(`incoming-message`)
                .listen('IncomingMessageEvent', (e) => {
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
                });

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

            $(document).on('click', 'a.list-chat-member', function() {
                let member_no_telpon = $(this).attr('value');

                // console.log(member_no_telpon)

                rerender_room_chat(member_no_telpon)

                Echo.channel(`room-${member_no_telpon}`)
                    .listen('IncomingMessageEvent', (e) => {
                        // console.log(`ada pesan dari ${member_no_telpon}`)
                        rerender_room_chat(member_no_telpon)
                    });

                Echo.channel(`message-sent`)
                    .listen('MessageSentEvent', (e) => {
                        console.log(`sent ${e.msg_id}`)
                        $(`#${e.msg_id}`).html(
                            '<i class="fa-solid fa-check fa-xs" style="color: rgba(0, 0, 0, .7);"></i>'
                        );
                    });

                Echo.channel(`message-delivered`)
                    .listen('MessageDeliveredEvent', (e) => {
                        console.log(`delivered ${e.msg_id}`)
                        $(`#${e.msg_id}`).html(
                            '<i class="fa-solid fa-check-double fa-xs" style="color: rgba(0, 0, 0, .7);"></i>'
                        );
                    });

                Echo.channel(`message-read`)
                    .listen('MessageReadEvent', (e) => {
                        console.log(`read ${e.msg_id}`)
                        $(`#${e.msg_id}`).html(
                            '<i class="fa-solid fa-check-double fa-xs" style="color: #3B71CA;"></i>'
                        );
                    });
            });
        });
    </script>
@endsection
