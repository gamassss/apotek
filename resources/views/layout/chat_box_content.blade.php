<div
    style="max-height: 46px; max-width: 100%; background-color: #fff; display: fixed; position: sticky; top: 0; padding-top: 12px; padding-bottom: 8px; border-bottom: 1px solid #ccc">
    <p style="line-height: 26px;" id="nama_member">{{ $member_name != '' ? $member_name : $member_no_telpon }}</p>
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
                    <div class="small p-2 ms-3 mb-1 rounded-3 d-flex gap-3 align-items-end bg-primary text-white">
                        <p style="margin-bottom: 0px; max-width: 300px;">{{ $chat->text }}</p>
                        <p class="small rounded-3 text-white" style="margin-bottom: 0px; font-size: 10px;">
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
                        <p style="margin-bottom: 0px; color: #4F4F4F; max-width: 300px;">{{ $chat->text }}</p>
                        <div class="d-flex align-items-baseline gap-1">
                            <p class="small rounded-3 text-muted" style="margin-bottom: 0px; font-size: 10px;">
                                {{ $chat->created_at->format('H:i') }}</p>
                            <div id="{{ $fonnte_chat_id }}">
                                @if ($status == 'true')
                                <i class="fa-regular fa-clock fa-xs" style="color: rgba(0, 0, 0, .7);"></i>
                                @elseif ($chat->state == 'sent' && $status == 'sent')
                                <i class="fa-solid fa-check fa-xs" style="color: rgba(0, 0, 0, .7);"></i>
                                @elseif($chat->state == 'delivered' && $status == 'sent')
                                <i class="fa-solid fa-check-double fa-xs" style="color: rgba(0, 0, 0, .7);"></i>
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
                    <div class="small p-2 ms-3 mb-1 rounded-3 d-flex gap-3 align-items-end bg-primary text-white">
                        <p style="margin-bottom: 0px; max-width: 300px;">{{ $chat->text }}</p>
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
                        <p style="margin-bottom: 0px; color: #4F4F4F; max-width: 300px;">{{ $chat->text }}</p>
                        <div class="d-flex align-items-baseline gap-1">
                            <p class="small rounded-3 text-muted" style="margin-bottom: 0px; font-size: 10px;">
                                {{ $chat->created_at->format('H:i') }}</p>
                            <div id="{{ $fonnte_chat_id }}">
                                @if ($status == 'true')
                                    <i class="fa-regular fa-clock fa-xs" style="color: rgba(0, 0, 0, .7);"></i>
                                @elseif ($chat->state == 'sent' && $status == 'sent')
                                    <i class="fa-solid fa-check fa-xs" style="color: rgba(0, 0, 0, .7);"></i>
                                @elseif($chat->state == 'delivered' && $status == 'sent')
                                    <i class="fa-solid fa-check-double fa-xs" style="color: rgba(0, 0, 0, .7);"></i>
                                @elseif($chat->state == 'read' && $status == 'sent')
                                    <i class="fa-solid fa-check-double fa-xs" style="color: #3B71CA;"></i>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @endif
@endforeach
