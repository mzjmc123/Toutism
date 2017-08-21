<?php

namespace App\Http\Controllers\Admin;

use App\Model\Customer;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use League\Flysystem\Exception;

class CustomerController extends Controller
{

    public function index($customer_name = "")
    {
        if($customer_name != ""){
            $customer = DB::table('customer as cs')->join('user as u', 'cs.user_id', '=', 'u.user_id')
                ->select('cs.customer_id', 'cs.customer_name', 'cs.created_at', 'cs.updated_at', 'u.user_name','u.user_id')
                ->where('cs.customer_name','like','%'.$customer_name.'%')->paginate(15);
        }else{
            $customer = DB::table('customer as cs')->join('user as u', 'cs.user_id', '=', 'u.user_id')
                ->select('cs.customer_id', 'cs.customer_name', 'cs.created_at', 'cs.updated_at', 'u.user_name','u.user_id')->paginate(15);
        }


        return view('customer.index', compact('customer'));
    }

    public function add_customer(){
        if ($input = Input::all()) {
            $date_at = date('Y-m-d H:i:s', time());
            try {
                $customer = Customer::where('customer_name', $input['customer_name'])->first();
                if ($customer) {
                    $data = [
                        'status' => 0,
                        'msg' => 'This user already exists. Please contact the client or add another user',
                    ];
                } else {
                    DB::table('customer')->insert([
                        'user_id' => $input['user_id'],
                        'customer_name' => $input['customer_name'],
                        'customer_iphone' => $input['customer_iphone'],
                        'customer_email' => $input['customer_email'],
                        'customer_city' => $input['customer_city'],
                        'customer_type' => $input['customer_type'],
                        'created_at' => $date_at,
                        'updated_at' => $date_at,

                    ]);
                    $data = [
                        'status' => 1,
                        'msg' => 'Customer add success',
                    ];
                }
                return $data;

            } catch (Exception $e) {

            }
        }
    }

    public function modify($customer_id){

        $customer = Customer::WHERE('customer_id', $customer_id)->first();
        //dd($customer);
        return $customer;
    }

    public function modify_form($customer_id){
        $input = Input::all();
        try {
            DB::beginTransaction();

            if ($input['user_id2'] != $input['user_id']) {
                $sorry = [
                    'status' => 2,
                    'msg' => 'Sorry, you do not have permission to modify this client',
                ];
                return $sorry;
            }
            $customer = DB::table('customer')->where(['customer_id' => $customer_id])
                ->update(['user_id' => $input['user_id'],
                    'customer_name' => $input['customer_name'],
                    'customer_email' => $input['customer_email'],
                    'customer_iphone' => $input['customer_iphone'],
                    'customer_city' => $input['customer_city'],
                    'customer_type' => $input['customer_type'],
                    'updated_at' => date('Y-m-d:H:i:s'),]);
            if ($customer) {
                $data = [
                    'status' => 1,
                    'msg' => 'Customer modify success',
                ];
            } else {
                $data = [
                    'status' => 0,
                    'msg' => '失败',
                ];
            }
            DB::commit();
            return $data;

        } catch (Exception $e) {
            DB::rollback();
        }

    }

    public function delete($customer_id){
        $input = Input::all();
        $users_id = $input['session_id'];
        $user = DB::table('user')->where('user_id',$users_id)->first();
        $customer = DB::table('customer')->where('customer_id',$customer_id)->first();
        if($user->user_id != $customer->user_id){
            $sorry = [
                'status' => 2,
                'msg' => 'Sorry, you can\'t delete this customer',
            ];
            return $sorry;
        }
       $result = DB::table('customer')->where(['customer_id' => $customer_id])->delete();
        if($result){
            $data = [
                'status'=>0,
                'msg'=>'Customer information  deletion succeeded',
            ];
        }else{
            $data = [
                'status'=>1,
                'msg'=>'Customer information deletion failed',
            ];
        }
        return $data;
    }

}
