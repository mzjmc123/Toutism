<?php

namespace App\Http\Controllers\Admin;

use App\Model\Group;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use League\Flysystem\Exception;

class AuthController extends Controller
{
    public function index($group_name = ''){

        if($group_name != ""){
            $group = DB::table('group')->where('group.group_name','like','%'.$group_name.'%')->orderby('created_at','desc')->paginate(15);
        }else{
            $group = DB::table('group')->orderby('created_at','desc')->paginate(15);

        }
        return view('admin.auth.index',compact('group'));
    }

    public function add_group(){

        if( $input = Input::all()){
            $date_at = date('Y-m-d H:i:s', time());
            try{
                $group = Group::where('group_name',$input['group_name'])->first();

                    if($group){
                        $data = [
                            'status' =>0,
                            'msg' => 'Sorry, this permission group already exists. You cannot add it again',
                        ];
                    }else{
                        DB::table('group')->insert([
                            'group_name' => $input['group_name'],
                            'group_remarks' => $input['group_remarks'],
                            'group_status' => 1,
                            'created_at' => $date_at,
                            'updated_at' => $date_at,
                        ]);
                        $data = [
                            'status' => 1,
                            'msg' => 'Permissions group added successfully',
                        ];
                    }
                return $data;

            }catch (Exception $e){

            }

        }

    }

    public function status($group_id){

        $group = Group::find($group_id);
        $group->group_status = 0;
        $group->updated_at = date('Y-m-d:H:i:s',time());
        $_re = $group->update();
        if($_re){
            $data = [
                'status'=>0,
                'msg'=>'Modify information successfully',
            ];
        }else{
            $data = [
                'status'=>1,
                'msg'=>'Failed to modify information',
            ];
        }
        return $data;
    }
    public function state($group_id){

        $group = Group::find($group_id);
        $group->group_status = 1;
        $group->updated_at = date('Y-m-d:H:i:s',time());
        $_re = $group->update();
        if($_re){
            $data = [
                'status'=>0,
                'msg'=>'Modify information successfully',
            ];
        }else{
            $data = [
                'status'=>1,
                'msg'=>'Failed to modify information',
            ];
        }
        return $data;
    }

    public function modify($group_id){
        $group = Group::where('group_id',$group_id)->first();
        //dd($group);
        return $group;
    }

    public function modify_form($group_id){
        $input = Input::all();

        $group = Group::find($group_id);
        try{

            $groups = DB::table('group')->where(['group_name'=>$input['group_name']])->first();
            if($groups){
                $data = [
                    'status' => 3,
                    'msg' => 'The permission group exists to modify other permissions groups',
                ];
            }else{
                $group->group_name = $input['group_name'];
                $group->group_remarks = $input['group_remarks'];
                $group->updated_at = date('Y-m-d:H:i:s',time());
                $result = $group->update();
                if($result){
                    $data = [
                        'status'=>0,
                        'msg'=>'Permission modification failed',
                    ];
                }else{
                    $data = [
                        'status'=>1,
                        'msg'=>'Permissions change successfully',
                    ];
                }
            }
            return $data;
        }catch (Exception $e){

        }
    }
}
