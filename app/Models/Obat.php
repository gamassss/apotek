<?php

namespace App\Models;

use App\Models\Member;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Obat extends Model
{
    protected $guarded = ['id'];
    use HasFactory;
    /**
     * The transaksis that belong to the Obat
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
  
}
