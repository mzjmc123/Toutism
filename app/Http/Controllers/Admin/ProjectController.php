<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use League\Flysystem\Exception;

class ProjectController extends Controller
{
    public function index($project_name = ""){
        if($project_name != ""){
            $project = DB::table('project as pj')->join('user as u', 'pj.user_id', '=', 'u.user_id')
                ->select('pj.project_id', 'pj.project_name', 'pj.created_at', 'pj.updated_at', 'u.user_name','u.user_id')
                ->where('pj.project_name','like','%'.$project_name.'%')->paginate(15);
        }else{
            $project = DB::table('project as pj')->join('user as u', 'pj.user_id', '=', 'u.user_id')
                ->select('pj.project_id', 'pj.project_name', 'pj.created_at', 'pj.updated_at', 'u.user_name','u.user_id')
                ->where('pj.project_name','like','%'.$project_name.'%')->paginate(15);
        }



        return view('project.index',compact('project'));
    }
    public  function add_project($user_id){
        $week = array();
        for($i =1; $i<=7; $i++){
            $hours = array();
            for($k=1; $k<=24; $k++){
                array_push($hours,$k);
            }
            array_push($week,$hours);
        }

        //$user = DB::table('user')->where('user_id',$user_id)->first();

        $customer = DB::table('customer')->where('user_id',$user_id)->get();

        return view('project.add',compact('week','customer'));
    }

   public function add(){
        $input = Input::all();
       try{
           DB::beginTransaction();
           $date_at = date('Y-m-d H:i:s', time());
           $delivery_type = $input['check'];
            DB::table('project')->insert([
               'user_id' => $input['user_id'],
               'customer_id' => $input['customer_id'],
               'project_name' => $input['project_name'],
               'start_time' => $input['start_time'],
               'end_time' => $input['end_time'],
               'delivery_mode' => implode(",", $delivery_type),
               'budget_money' => $input['project_money'],
               'project_remarks' => $input['project_remkres'],
               'created_at' => $date_at,
               'updated_at' => $date_at,
           ]);
           DB::commit();

           return redirect('admin/project/index');
       }catch (Exception $e){
           DB::rollback();
       }
   }

   public function project_modify($project_id,$user_id){

       $project = DB::table('project')->where('project_id',$project_id)->first();

       $customer = DB::table('customer')->where('user_id',$user_id)->get();

       return view('project.edit',compact('project','customer'));
   }

   public function mofifyform($project_id){
       $input = Input::except('_token');
       $date_at = date('Y-m-d H:i:s', time());
       try{
           DB::beginTransaction();
           if ($input['session_id'] != $input['user_id']) {
               return back()->with('msg', 'Sorry, you do not have permission to modify this task information');
           }
           $delivery_type = $input['check'];
           DB::table('project')->where(['project_id' => $project_id ])
               ->update(['user_id' => $input['session_id'],
                          'delivery_mode' =>implode(",", $delivery_type),
                          'start_time' => $input['start_time'],
                          'end_time' =>$input['end_time'],
                          'budget_money' =>$input['project_money'],
                          'project_remarks' => $input['project_remkres'],
                          'updated_at' => $date_at,
               ]);
           DB::commit();
           return redirect('admin/project/index');
       }catch (Exception $e){
           DB::roolback();
       }

   }
}
