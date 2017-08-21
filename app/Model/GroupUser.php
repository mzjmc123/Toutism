<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class GroupUser extends Model
{
    protected $table = 'group_user';

    protected $primaryKey = 'id';

    protected $guarded = [];

    public $timestamps = false;
}
