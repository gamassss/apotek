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
                            <div class="list-group" id="list-kontak-member">
                                @if (isset($members_pegawai))
                                    @foreach ($members_pegawai as $member)
                                        @php
                                            // $latest_chat_time = !isset($member->latest_chat[0]->created_at) ? $member->latest_chat[0]->created_at : Carbon\Carbon::now()->timestamp;
                                            // $latest_chat_text = isset($member->latest_chat[0]->text) ? $member->latest_chat[0]->text : Carbon\Carbon::now()->timestamp;
                                            $latest_chat_text = isset($member->latest_chat[0]->text) ? $member->latest_chat[0]->text : 'Mulai percakapan dengan member anda.';
                                            // dd($latest_chat_text);
                                            $latest_chat_time = isset($member->latest_chat[0]->created_at) ? $member->latest_chat[0]->created_at : Carbon\Carbon::now();
                                            $date = Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $latest_chat_time, 'Asia/Jakarta');
                                            $date->setTimeZone('Asia/Jakarta');
                                            // dd($date);
                                        @endphp
                                        <a href="javascript:void(0);"
                                            class="list-group-item list-group-item-action flex-column align-items-start list-chat-member"
                                            style="border: none;" value="{{ $member->no_telpon }}">
                                            <div class="d-flex justify-content-between w-100">
                                                <h6>{{ $member->no_telpon }}</h6>
                                                <small class="text-muted">{{ $date->diffForHumans() }}</small>
                                            </div>
                                            <p class="mb-1 text-muted">
                                                {{ $latest_chat_text }}
                                            </p>
                                        </a>
                                    @endforeach
                                @else
                                    <p class="text-center text-muted">Tidak ada member</p>
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

            function submitForm() {
                $('#chat2').submit();
                console.log('submitted')
            }

            $('.list-chat-member').one('click', function() {
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

            //get chat data onclick
            $('a.list-chat-member').on('click', function() {
                let member_no_telpon = $(this).attr('value');
                // $.ajax({
                //     type: "GET",
                //     url: '{{ route('get_name_by_phone_number') }}',
                //     data: {
                //         'no_telpon': member_no_telpon
                //     },
                //     success: function(response) {
                //         $('#nama_member').html(response);
                //     }
                // });

                $.ajax({
                    type: "GET",
                    url: '{{ route('get_chat_by_phone_number') }}',
                    data: {
                        'no_telpon': member_no_telpon
                    },
                    success: function(response) {
                        $('#chat2').html(response);
                        var chat_box = $('#chat-box');
                        chat_box.animate({
                            scrollTop: chat_box.prop('scrollHeight')
                        }, 500);
                        $('#chat-first-notif').addClass('d-none');
                    }
                });
            });

            // $('#send-btn').on('click', function() {
            //     console.log('in')
            // });
        });

        $('#send-btn').ready(function() {
            $('#send-btn').on('click', function() {
                console.log('in')
            });
        });
    </script>
@endsection
