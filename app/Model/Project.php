<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{

    protected  $table = 'project';

    protected $primaryKey = 'project_id';

    protected  $guarded = [];

    public $timestamps = false;
 }
