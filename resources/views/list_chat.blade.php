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
                <h6>{{ $member->nama_member }}</h6>
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
