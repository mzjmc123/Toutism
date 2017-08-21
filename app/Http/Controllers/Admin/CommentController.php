<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class CommentController extends Controller
{
    /**
     * 图片上传
     */
    public function upload(){
        //echo 123456789987654321;
        //Filedata
        //  $_input = Input::all();
        // dd($_input);
        //$_file = Input::file('Filedata');
        //dd($_file);
        //file获取上传文件
        $file = Input::file('Filedata');
        if($file -> isValid()){
            //获取临时文件的绝对路径
            //  $realPath = $file -> getRealPath();
            //上传文件的后缀
            $entenion = $file ->getClientOriginalExtension();
            //移动文件并充命名
            $newName = date('YmdHis').mt_rand(100,999).'.'.$entenion;
            $path = $file->move(base_path().'/public/uploads',$newName);
            $filepath = 'public/uploads/'.$newName;
            return $filepath;
        }
    }
}
