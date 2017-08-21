<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{

    protected $table = 'user';

    protected  $primaryKey = 'user_id';

    protected $guarded = [];

    public $timestamps = false;

//    public function hasManyPays(){
//
//        return $this->hasMany('GgroupUser', 'user_id', 'id');
//
//    }


}
