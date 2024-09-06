<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TbcP2p extends Model
{
    use HasFactory;

    protected $fillable = [
        'sender_id',
        'receiver_id',
        'sender_name',
        'receiver_name',
        'sender_wallet',
        'receiver_wallet',
        'amount',
        'pay_currency',
        'krin_amount',
        'ref',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
