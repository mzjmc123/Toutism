<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Model\User;
use ConsoleTVs\Charts\Facades\Charts;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class BusinessController extends Controller
{

    public function index(){

       // $user = DB::select('select * from Tourism_user');
        $user = User::all();
        //dd($user);
        $chart = Charts::database($user,'bar', 'highcharts')
            ->title('username')
            ->elementLabel("My User")
            ->dimensions(650, 400)
            ->responsive(false)
            ->groupByMonth();

        $data = Charts::database($user,'pie', 'highcharts')
            ->title('username')
            ->elementLabel("My User")
            ->dimensions(650, 400)
            ->responsive(false)
            ->groupByMonth();
        $result = Charts::database($user,'line', 'highcharts')
            ->title('username')
            ->elementLabel("My User")
            ->dimensions(650, 400)
            ->responsive(false)
            ->groupByMonth();
        $item = Charts::database($user,'donut', 'highcharts')
            ->title('username')
            ->elementLabel("My User")
            ->dimensions(650, 400)
            ->responsive(false)
            ->groupByMonth();
        $page = Charts::database($user,'area', 'highcharts')
            ->title('username')
            ->elementLabel("My User")
            ->dimensions(650, 400)
            ->responsive(false)
            ->groupByMonth();

        return view('sales.index',compact('chart','data','result','item','page'));
    }

}
