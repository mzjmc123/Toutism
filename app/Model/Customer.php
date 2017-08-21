<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected  $table = 'customer';

    protected $primaryKey = 'customer_id';

    protected $guarded = [];

    public $timestamps = false;
}
