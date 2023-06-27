<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Member extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function obats()
    {
        return $this->belongsToMany(Obat::class, 'transaksis')
            ->withPivot('lama_habis')
            ->withTimestamps();
    }

    public function chats()
    {
        return $this->hasMany(Chat::class, 'pengirim', 'no_telpon');
    }
}
