    <div id="chat-box" class="card-body overflow-auto pt-0" data-mdb-perfect-scrollbar="true" style="position: relative;">
        <div
            style="max-height: 46px; max-width: 100%; background-color: #fff; display: fixed; position: sticky; top: 0; padding-top: 12px; padding-bottom: 8px; border-bottom: 1px solid #ccc">
            <p style="line-height: 26px;" id="nama_member">{{ $member_name }}</p>
        </div>
        {{-- @include('layout.room_chat') --}}
        @foreach ($chats as $chat)
            @if ($loop->first)
                @if (true)
                    <!-- Untuk Member -->
                    <div class="d-flex flex-row justify-content-start mt-2">
                        <div>
                            <p class="small p-2 ms-3 mb-1 rounded-3" style="background-color: #f5f6f7;">
                                {{ $chat->text }}
                            </p>
                            <p class="small ms-3 mb-3 rounded-3 text-muted">23:58</p>
                        </div>
                    </div>
                @else
                    <!-- Untuk Pegawai -->
                    <div class="d-flex flex-row justify-content-end mb-4 mt-2">
                        <div>
                            <p class="small p-2 me-3 mb-1 text-white rounded-3 bg-primary">That's awesome!</p>
                            <p class="small p-2 me-3 mb-1 text-white rounded-3 bg-primary">I will meet you
                                Sandon Square
                                sharp at
                                10 AM</p>
                            <p class="small p-2 me-3 mb-1 text-white rounded-3 bg-primary">Is that okay?</p>
                            <p class="small me-3 mb-3 rounded-3 text-muted d-flex justify-content-end">00:09</p>
                        </div>
                    </div>
                @endif
            @else
                @if (true)
                    <!-- Untuk Member -->
                    <div class="d-flex flex-row justify-content-start">
                        <div>
                            <p class="small p-2 ms-3 mb-1 rounded-3" style="background-color: #f5f6f7;">
                                {{ $chat->text }}
                            </p>
                            {{-- <p class="small p-2 ms-3 mb-1 rounded-3" style="background-color: #f5f6f7;">How are
                        you ...???
                    </p>
                    <p class="small p-2 ms-3 mb-1 rounded-3" style="background-color: #f5f6f7;">What are
                        you doing
                        tomorrow? Can we come up a bar?</p> --}}
                            <p class="small ms-3 mb-3 rounded-3 text-muted">23:58</p>
                        </div>
                    </div>
                @else
                    <!-- Untuk Pegawai -->
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
                    </div>
                @endif
            @endif
        @endforeach

        <!-- Divider -->
        {{-- <div class="divider d-flex align-items-center mb-4">
                    <p class="text-center mx-3 mb-0" style="color: #a2aab7;">Today</p>
                </div> --}}

        <!-- After Divide -->
        {{-- <div class="d-flex flex-row justify-content-end mb-4 pt-1">
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
                </div> --}}
    </div>
    <div id="chat-footer" class="card-footer text-muted d-flex justify-content-start align-items-center p-3">
        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3-bg.webp" alt="avatar 3"
            style="width: 40px; height: 100%;">
        <input type="text" class="form-control form-control-lg" id="exampleFormControlInput1"
            placeholder="Type message">
        <a class="ms-1 text-muted" href="#!"><i class="fas fa-paperclip"></i></a>
        <a class="ms-3 text-muted" href="#!"><i class="fas fa-smile"></i></a>
        <a class="ms-3" href="#!"><i class="fas fa-paper-plane"></i></a>
    </div>
    <div id="chat-first-notif" class="d-flex justify-content-center align-items-center"
        style="height: 100%; padding: 0px 64px;">
        <p class="text-center text-muted">Mulailah berkomunikasi dengan member apotek secara efisien dan efektif.
            Anda
            dapat memberikan panduan dosis obat, menjawab pertanyaan, atau memberikan rekomendasi produk dengan
            mudah
            dan cepat.</p>
    </div>
