<?php

namespace Smile\Bank\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Smile\Bank\Database\Factories\CustomerFactory;

class Customer extends Model
{
    use SoftDeletes, HasFactory;

    public    $timestamps = true;
    protected $fillable   = ['first_name', 'last_name', 'mobile', 'email'];


    public function accounts()
    {
        return $this->hasMany(Account::class);
    }

    protected static function newFactory()
    {
        return CustomerFactory::new();
    }
}
