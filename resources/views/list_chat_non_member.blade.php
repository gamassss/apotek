@if (isset($members_pegawai))
    @foreach ($members_pegawai as $member)
        @if (true)
            @php
                $latest_chat_text = isset($member->latest_chat[0]->text) ? $member->latest_chat[0]->text : 'Mulai percakapan dengan member anda.';
                $searched_chat = isset($member->searched_chat[0]->text) ? $member->searched_chat[0]->text : $latest_chat_text;
                
                $latest_chat_time = isset($member->latest_chat[0]->created_at) ? $member->latest_chat[0]->created_at : Carbon\Carbon::now();
                $searched_chat_time = isset($member->searched_chat[0]->created_at) ? $member->searched_chat[0]->created_at : '';
                $date_latest = Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $latest_chat_time, 'Asia/Jakarta');
                $date_latest->setTimeZone('Asia/Jakarta');
                $carbonTimestamp = Carbon\Carbon::parse($date_latest);
                
                if ($searched_chat_time) {
                    $date_searched = Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $searched_chat_time, 'Asia/Jakarta');
                    $date_searched->setTimeZone('Asia/Jakarta');
                    $carbonTimestamp = Carbon\Carbon::parse($date_searched);
                }
                
                $now = Carbon\Carbon::now();
                
                // Cek jika timestamp pada hari yang sama dengan hari ini
                if ($carbonTimestamp->isSameDay($now)) {
                    $formattedTime = $carbonTimestamp->format('H:i'); // Format jam dan menit (misalnya: 03:58)
                }
                // Cek jika timestamp pada hari kemarin
                elseif ($carbonTimestamp->isYesterday()) {
                    $formattedTime = 'Yesterday';
                }
                // Jika timestamp lebih lama dari hari kemarin
                else {
                    $formattedTime = $carbonTimestamp->format('d/m/Y');
                }
                // dd($date);
            @endphp
            @if ($member->pengirim != '088806388436')
                <a href="javascript:void(0);"
                    class="list-group-item list-group-item-action flex-column align-items-start list-chat-member"
                    style="border: none;" value="{{ $member->pengirim }}">
                    <div class="d-flex justify-content-between w-100">
                        <h6>{{ $member->pengirim }}</h6>
                        @if ($searched_chat_time)
                            <small class="text-muted">{{ $formattedTime }}</small>
                        @else
                            @if ($member->latest_chat)
                                <small class="text-muted">{{ $formattedTime }}</small>
                            @else
                                <small class="text-muted">{{ '~' }}</small>
                            @endif
                        @endif
                    </div>
                    <p class="mb-1 text-muted">
                        {{ $searched_chat }}
                    </p>
                </a>
            @else
                <a href="javascript:void(0);"
                    class="list-group-item list-group-item-action flex-column align-items-start list-chat-member"
                    style="border: none;" value="{{ $member->penerima }}">
                    <div class="d-flex justify-content-between w-100">
                        <h6>{{ $member->penerima }}</h6>
                        @if ($searched_chat_time)
                            <small class="text-muted">{{ $formattedTime }}</small>
                        @else
                            @if ($member->latest_chat)
                                <small class="text-muted">{{ $formattedTime }}</small>
                            @else
                                <small class="text-muted">{{ '~' }}</small>
                            @endif
                        @endif
                    </div>
                    <p class="mb-1 text-muted">
                        {{ $searched_chat }}
                    </p>
                </a>
            @endif
        @endif
    @endforeach
@else
    <p class="text-center text-muted">Tidak ada member</p>
@endif
