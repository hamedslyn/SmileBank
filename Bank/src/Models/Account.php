<?php

namespace Smile\Bank\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Account extends Model
{
    use SoftDeletes;

    public    $timestamps = true;
    protected $fillable   = ['account_number', 'balance', 'status', 'customer_id'];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function transfersSent()
    {
        return $this->hasMany(Transfer::class, 'sender_account_id');
    }

    public function transfersReceived()
    {
        return $this->hasMany(Transfer::class, 'receiver_account_id');
    }
}
