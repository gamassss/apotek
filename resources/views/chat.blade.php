@extends('layout.main')
@section('content')
    {{-- <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Members /</span> Chats
    </h4> --}}
    <div class="row">
        <!-- List Chat Dengan Member -->
        <div class="col-md-4 col-sm-4">
            <div class="card overflow-hidden mb-4" style="max-height: calc(100vh - 128px); min-height: calc(100vh - 128px);">
                <h5 class="card-header" style="padding-bottom: 12px;">Chat</h5>
                <div class="card-body" id="vertical-example">
                    <div class="col-lg-12">
                        <div class="demo-inline-spacing">
                            <div class="list-group">
                                @if (isset($members_pegawai))
                                    @foreach ($members_pegawai as $member)
                                        @php
                                            // $latest_chat_time = !isset($member->latest_chat[0]->created_at) ? $member->latest_chat[0]->created_at : Carbon\Carbon::now()->timestamp;
                                            // $latest_chat_text = isset($member->latest_chat[0]->text) ? $member->latest_chat[0]->text : Carbon\Carbon::now()->timestamp;
                                            $latest_chat_text = isset($member->latest_chat[0]->text) ? $member->latest_chat[0]->text : '';
                                            // dd($latest_chat_text);
                                            $latest_chat_time = isset($member->latest_chat[0]->created_at) ? $member->latest_chat[0]->created_at : Carbon\Carbon::now();
                                            $date = Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $latest_chat_time, 'Asia/Jakarta');
                                            $date->setTimeZone('Asia/Jakarta');
                                            // dd($date);   
                                        @endphp
                                        <a href="javascript:void(0);"
                                            class="list-group-item list-group-item-action flex-column align-items-start list-chat-member"
                                            style="border: none;">
                                            <div class="d-flex justify-content-between w-100">
                                                <h6>{{ $member->no_telpon }}</h6>
                                                <small class="text-muted">{{ $date->diffForHumans() }}</small>
                                            </div>
                                            <p class="mb-1">
                                                {{ $latest_chat_text }}
                                            </p>
                                        </a>
                                    @endforeach
                                @else
                                    <p>Tidak ada member</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!--/ List Chat Dengan Member -->

        <!-- Room Chat -->
        <div class="card col-md-8" id="chat2">
            <div class="card-body overflow-auto" data-mdb-perfect-scrollbar="true"
                style="position: relative; height: 400px">
                <div class="d-flex flex-row justify-content-start">
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3-bg.webp" alt="avatar 1"
                        style="width: 45px; height: 100%;">
                    <div>
                        <p class="small p-2 ms-3 mb-1 rounded-3" style="background-color: #f5f6f7;">Hi</p>
                        <p class="small p-2 ms-3 mb-1 rounded-3" style="background-color: #f5f6f7;">How are
                            you ...???
                        </p>
                        <p class="small p-2 ms-3 mb-1 rounded-3" style="background-color: #f5f6f7;">What are
                            you doing
                            tomorrow? Can we come up a bar?</p>
                        <p class="small ms-3 mb-3 rounded-3 text-muted">23:58</p>
                    </div>
                </div>

                <div class="divider d-flex align-items-center mb-4">
                    <p class="text-center mx-3 mb-0" style="color: #a2aab7;">Today</p>
                </div>

                <div class="d-flex flex-row justify-content-end mb-4 pt-1">
                    <div>
                        <p class="small p-2 me-3 mb-1 text-white rounded-3 bg-primary">Hiii, I'm good.</p>
                        <p class="small p-2 me-3 mb-1 text-white rounded-3 bg-primary">How are you doing?
                        </p>
                        <p class="small p-2 me-3 mb-1 text-white rounded-3 bg-primary">Long time no see!
                            Tomorrow
                            office. will
                            be free on sunday.</p>
                        <p class="small me-3 mb-3 rounded-3 text-muted d-flex justify-content-end">00:06</p>
                    </div>
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava4-bg.webp" alt="avatar 1"
                        style="width: 45px; height: 100%;">
                </div>

                <div class="d-flex flex-row justify-content-start mb-4">
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3-bg.webp" alt="avatar 1"
                        style="width: 45px; height: 100%;">
                    <div>
                        <p class="small p-2 ms-3 mb-1 rounded-3" style="background-color: #f5f6f7;">Okay</p>
                        <p class="small p-2 ms-3 mb-1 rounded-3" style="background-color: #f5f6f7;">We will
                            go on
                            Sunday?</p>
                        <p class="small ms-3 mb-3 rounded-3 text-muted">00:07</p>
                    </div>
                </div>

                <div class="d-flex flex-row justify-content-end mb-4">
                    <div>
                        <p class="small p-2 me-3 mb-1 text-white rounded-3 bg-primary">That's awesome!</p>
                        <p class="small p-2 me-3 mb-1 text-white rounded-3 bg-primary">I will meet you
                            Sandon Square
                            sharp at
                            10 AM</p>
                        <p class="small p-2 me-3 mb-1 text-white rounded-3 bg-primary">Is that okay?</p>
                        <p class="small me-3 mb-3 rounded-3 text-muted d-flex justify-content-end">00:09</p>
                    </div>
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava4-bg.webp" alt="avatar 1"
                        style="width: 45px; height: 100%;">
                </div>

                <div class="d-flex flex-row justify-content-start mb-4">
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3-bg.webp" alt="avatar 1"
                        style="width: 45px; height: 100%;">
                    <div>
                        <p class="small p-2 ms-3 mb-1 rounded-3" style="background-color: #f5f6f7;">Okay i
                            will meet
                            you on
                            Sandon Square</p>
                        <p class="small ms-3 mb-3 rounded-3 text-muted">00:11</p>
                    </div>
                </div>

                <div class="d-flex flex-row justify-content-end mb-4">
                    <div>
                        <p class="small p-2 me-3 mb-1 text-white rounded-3 bg-primary">Do you have pictures
                            of Matley
                            Marriage?</p>
                        <p class="small me-3 mb-3 rounded-3 text-muted d-flex justify-content-end">00:11</p>
                    </div>
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava4-bg.webp" alt="avatar 1"
                        style="width: 45px; height: 100%;">
                </div>

                <div class="d-flex flex-row justify-content-start mb-4">
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3-bg.webp" alt="avatar 1"
                        style="width: 45px; height: 100%;">
                    <div>
                        <p class="small p-2 ms-3 mb-1 rounded-3" style="background-color: #f5f6f7;">Sorry I
                            don't
                            have. i
                            changed my phone.</p>
                        <p class="small ms-3 mb-3 rounded-3 text-muted">00:13</p>
                    </div>
                </div>

                <div class="d-flex flex-row justify-content-end">
                    <div>
                        <p class="small p-2 me-3 mb-1 text-white rounded-3 bg-primary">Okay then see you on
                            sunday!!
                        </p>
                        <p class="small me-3 mb-3 rounded-3 text-muted d-flex justify-content-end">00:15</p>
                    </div>
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava4-bg.webp" alt="avatar 1"
                        style="width: 45px; height: 100%;">
                </div>

            </div>
            <div class="card-footer text-muted d-flex justify-content-start align-items-center p-3">
                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3-bg.webp" alt="avatar 3"
                    style="width: 40px; height: 100%;">
                <input type="text" class="form-control form-control-lg" id="exampleFormControlInput1"
                    placeholder="Type message">
                <a class="ms-1 text-muted" href="#!"><i class="fas fa-paperclip"></i></a>
                <a class="ms-3 text-muted" href="#!"><i class="fas fa-smile"></i></a>
                <a class="ms-3" href="#!"><i class="fas fa-paper-plane"></i></a>
            </div>
        </div>
        <!--/ Room Chat -->
    </div>
    <script>
        // $('a.list-chat-member').on('mouseenter', function () {
        //     console.log('hov')
        //     $(this).addClass('active');
        // }).on('mouseleave', function () {
        //     console.log('leave')
        //     $(this).removeClass('active');
        // });
    </script>
@endsection
