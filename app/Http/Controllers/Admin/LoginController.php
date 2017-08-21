<?php

namespace App\Http\Controllers\Admin;

use App\Model\Group;
use App\Model\GroupUser;
use App\Model\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Validation\Rules\In;
use League\Flysystem\Exception;
use phpDocumentor\Reflection\DocBlock\Tag;


class LoginController extends Controller{


    public function action_index(){
        return view('admin.login');
    }

    public function index(){
        $input = Input::except('_token');
        $user_email = $input['user_email'];
        $user_password = $input['user_password'];

        $data = DB::table('user')->where(['user_email'=>$user_email])->first();
        if (!$data == null) {
            if ($data->user_state == 1) {

                $ol_user_password = Crypt::decrypt($data->user_password);
                if ($user_password == $ol_user_password) {
                    session(['user' => $data]);
                    return redirect('admin/home');
                } else {
                    return back()->with('msg', 'ERROR Incorrect username or password');
                }
                }else{
            return back()->with('msg','The user has been blocked. Please contact the administrator to activate this account');
            }
        } else {
            return back()->with('msg', 'The user name does not exist please register');
        }

    }

    public function home(){
        return view('admin.home');
    }

    public function register(){

        if ($input = Input::all()){
            $date_at = date('Y-m-d H:i:s', time());
            try{
                DB::beginTransaction();
                $user = User::all();
                foreach ($user as $users){
                    if($users->user_email == $input['user_email']){
                        return back()->with('msg','The mailbox has been registered. Please enter a new mailbox');
                    }
                }
               $user_id =  DB::table('user')->insertGetId([
                    'user_name' => $input['user_name'],
                    'user_email' => $input['user_email'],
                    'user_password' =>Crypt::encrypt($input['user_password']) ,
                    'created_at' => $date_at,
                    'updated_at' => $date_at,
                ]);

//                DB::table('group_user')->insert([
//                   'user_id' => $user_id,
//                    'created_at' => $date_at,
//                   'updated_at' => $date_at,
//               ]);
                DB::commit();
                $users = User::where('user_id',$user_id)->first();
                session(['user' => $users]);

                return redirect('admin/index');

            }catch(\Exception $e){
                DB::rollback();
            }
        }

       return view('admin.register');
    }

    public function welcome(){

        $sum = DB::select('SELECT COUNT(*) AS usercount FROM tourism_user');

        return view('admin.index',compact('sum'));
    }

    public function exit(){
        session(['user'=>null]);
        return redirect('/admin');
    }

    public function profile($user_id){

        $user = DB::table('user')->where('user_id',$user_id)->first();
        $array = $user->user_skills;
        $str = preg_replace('/，+/',',',$array);
        $data = explode(",", $str);
        return view('admin.profile',compact('user','data'));
    }

    public function update($user_id){

        try{
            DB::beginTransaction();
            $date_at = date('Y-m-d H:i:s', time());
            $input = Input::except('_token');
            //$user = DB::table('user')->where(['user_id' => $user_id])->first();
            $user = User::where('user_id',$user_id)->first();
            $user->user_address = $input['user_address'] ;
            $user->user_experience = $input['user_experience'];
            $user->user_skills = $input['user_skills'];
            $user->user_education = $input['user_education'];
            $user->user_remarks = $input['user_remarks'] ? $input['user_remarks'] : null;
            $user->user_nickname = $input['user_nickname'];
            $user->user_occupation = $input['user_occupation'];
            $user->user_url = $input['user_url'];
            $user->updated_at = $date_at;
            $user->save();
            DB::commit();
            //$user = DB::table('user')->where('user_id',$user_id)->first();
            return redirect('admin/profile/'.$user->user_id);
        }catch (Exception $e){

            DB::rollback();

        }

    }

    public function user($username = ""){
        if($username != "" ){
            $sql = "SELECT u.user_id,u.user_name,u.user_nickname,u.created_at,u.updated_at,u.user_state,group_concat(group_name) group_name FROM tourism_user u ".
                    "LEFT JOIN  tourism_group_user gu ON u.user_id=gu.user_id ".
                    "LEFT JOIN tourism_group g ON gu.group_id=g.group_id ".
                    "WHERE u.user_name LIKE '%".$username."%' GROUP BY u.user_id,u.user_name,u.user_nickname,u.created_at,u.updated_at,u.user_state";

               $user = DB::Select($sql);

        }else{
            $sql = "SELECT u.user_id,u.user_name,u.user_nickname,u.created_at,u.updated_at,u.user_state,group_concat(group_name) group_name FROM tourism_user u 
                    LEFT JOIN  tourism_group_user gu ON u.user_id=gu.user_id 
                    LEFT JOIN tourism_group g ON gu.group_id=g.group_id 
                    GROUP BY u.user_id,u.user_name,u.user_nickname,u.created_at,u.updated_at,u.user_state";
            $user = DB::select($sql);

        }
        return view('admin.user',compact('user'));



    }

    public function status($user_id){

        $user = User::find($user_id);
        $user->user_state = 0;
        $user->updated_at = date('Y-m-d:H:i:s',time());
        $_re = $user->update();
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
    public function state($user_id){

        $user = User::find($user_id);
        $user->user_state = 1;
        $user->updated_at = date('Y-m-d:H:i:s',time());
        $_re = $user->update();
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

    public function add_user(){
          if($input = Input::all()){
              $date_at = date('Y-m-d H:i:s', time());
              try{
                  $user = User::where('user_email',$input['user_email'])->first();
                  if($user){
                      $data = [
                          'status' => 0,
                          'msg' => 'The mailbox has been registered. Please add an email box that has not been registered',
                      ];
                  }else{
                      DB::table('user')->insert([
                          'user_name' => $input['user_name'],
                          'user_email' => $input['user_email'],
                          'user_nickname' => $input['user_nickname'],
                          'user_password' =>Crypt::encrypt(123456),
                          'user_state' => 1,
                          'created_at' => $date_at,
                          'updated_at' => $date_at,

                      ]);
                      $data = [
                          'status' => 1,
                          'msg' =>'New user registration successful, please improve personal data as soon as possible',
                      ];
                  }
                  return $data;

              }catch(Exception $e){

              }
          }
    }

    public function user_group($user_id){
        $user = User::where('user_id',$user_id)->first();
        $group = Group::all();
        $sql = "SELECT DISTINCT c.user_id, c.user_name,d.group_name,c.user_email FROM
                (SELECT a.user_id,a.user_name,b.group_id,a.user_nickname,a.user_email FROM tourism_user AS a
                LEFT JOIN tourism_group_user AS b ON a.user_id = b.user_id)AS c 
                LEFT JOIN tourism_group AS d ON c.group_id = d.group_id WHERE c.user_id =".$user_id;
        $group_user = DB::select($sql);
       // dd($group_user);
//        foreach ($group_user as $k => $v) {
//            $arr = explode(",", $v->group_name);
////            $_arrs = explode('', $arr);
//            //dd($arr);
//        }
//        $group_user->group_name = $arr;
        return view('admin.user_group',compact('user','group','group_user'));
    }

    public function addgroup(){
        $input = Input::all();
        $check = $input['check'];
        try{
                foreach ($check as $ck){
                    DB::table('group_user')->insert([
                        'group_id' => $ck,
                        'user_id' => $input['user_id'],
                        'created_at' => date('Y-m-d:H:i:s',time()),
                        'updated_at' => date('Y-m-d:H:i:s',time()),
                    ]);
            }
            return redirect('admin/user');
        }catch (Exception $e){

        }

    }

    public function upload()
    {
        dd(12345678);
    }

    public function pwd()
    {
        $a = 123456;
        $b = Crypt::encrypt($a);
        $c = Crypt::decrypt($b);
        dd($b);
    }
}
