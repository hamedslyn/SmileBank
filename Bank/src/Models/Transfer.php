<?php

namespace Smile\Bank\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transfer extends Model
{
    use SoftDeletes;

    public    $timestamps = true;
    protected $fillable   = [
        'sender_account_id',
        'receiver_account_id',
        'amount',
        'status',
        'description',
        'tracking_code',
    ];

    public function senderAccount()
    {
        return $this->belongsTo(Account::class, 'sender_account_id');
    }

    public function receiverAccount()
    {
        return $this->belongsTo(Account::class, 'receiver_account_id');
    }
}
