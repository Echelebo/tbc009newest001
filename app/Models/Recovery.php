<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recovery extends Model
{
    use HasFactory;

    /**
     * Get the user associated with the KYC record.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected $fillable = [
        'user_id',
        'name',
        'email',
        'selectedcurrency',
        'proposedbal',
        'supportinfo',
        'status',
    ];
}
