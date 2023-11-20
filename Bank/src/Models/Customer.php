<?php

namespace Smile\Bank\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use SoftDeletes;

    public    $timestamps = true;
    protected $fillable   = ['first_name', 'last_name', 'mobile', 'email'];


    public function accounts()
    {
        return $this->hasMany(Account::class);
    }
}
