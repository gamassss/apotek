@if (isset($members_pegawai))
    @foreach ($members_pegawai as $member)
        @php
            // $latest_chat_time = !isset($member->latest_chat[0]->created_at) ? $member->latest_chat[0]->created_at : Carbon\Carbon::now()->timestamp;
            // $latest_chat_text = isset($member->latest_chat[0]->text) ? $member->latest_chat[0]->text : Carbon\Carbon::now()->timestamp;
            $latest_chat_text = isset($member->latest_chat) ? $member->latest_chat : 'Mulai percakapan dengan member anda.';
            $searched_chat = isset($member->searched_chat[0]->text) ? $member->searched_chat[0]->text : $latest_chat_text;
            // dd($searched_chat);
            $latest_chat_time = isset($member->latest_chat[0]->created_at) ? $member->latest_chat[0]->created_at : Carbon\Carbon::now();
            $searched_chat_time = isset($member->searched_chat[0]->created_at) ? $member->searched_chat[0]->created_at : '';
            $date_latest = Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $latest_chat_time, 'Asia/Jakarta');
            $date_latest->setTimeZone('Asia/Jakarta');
            
            if ($searched_chat_time) {
                $date_searched = Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $searched_chat_time, 'Asia/Jakarta');
                $date_searched->setTimeZone('Asia/Jakarta');
            }
            // dd($date);
        @endphp
        <a href="javascript:void(0);"
            class="list-group-item list-group-item-action flex-column align-items-start list-chat-member"
            style="border: none;" value="{{ $member->pengirim }}">
            <div class="d-flex justify-content-between w-100">
                <h6>{{ $member->pengirim }}</h6>
                @if ($searched_chat_time)
                    <small class="text-muted">{{ $date_searched->diffForHumans() }}</small>
                @else
                    <small class="text-muted">{{ $date_latest->diffForHumans() }}</small>
                @endif
            </div>
            <p class="mb-1 text-muted">
                {{ $searched_chat }}
            </p>
        </a>
    @endforeach
@else
    <p class="text-center text-muted">Tidak ada member</p>
@endif
