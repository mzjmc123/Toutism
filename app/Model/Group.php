<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $table = 'group';

    protected  $primaryKey = 'group_id';

    protected $guarded = [];

    public $timestamps = false;
}
