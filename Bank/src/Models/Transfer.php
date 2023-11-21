<?php

namespace Smile\Bank\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Smile\Bank\Database\Factories\TransferFactory;

class Transfer extends Model
{
    use SoftDeletes, HasFactory;

    const TRANSFER_STATUSES = [
        'VERIFIED'   => 'verified',
        'UNVERIFIED' => 'unverified',
    ];

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

    protected static function newFactory()
    {
        return TransferFactory::new();
    }

    public function scopeVerified($query)
    {
        return $query->where('status', self::TRANSFER_STATUSES['VERIFIED']);
    }

    public function scopeUnverified($query)
    {
        return $query->where('status', self::TRANSFER_STATUSES['UNVERIFIED']);
    }
}
