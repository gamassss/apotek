<div class="d-flex gap-3">
    <a href="{{ route('pegawai_chats.show', ['id' => $id]) }}" class="btn btn-secondary">Chat</a>
    <a href="{{ route('pegawai.show',['pegawai'=>$username]) }}" class="btn btn-primary">Profile</a>
</div>