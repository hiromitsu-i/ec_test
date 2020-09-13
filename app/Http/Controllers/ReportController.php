<?php

namespace App\Http\Controllers;

use App\Delivery;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    //
    public function report(Request $request)
    {
        $today = Carbon::today();
        $total_report = Delivery::select(DB::raw('SUM(amount) AS total_report'))->where('confirm_status',1)->first();
        $oldest_date = Delivery::select('created_at')->orderBy('created_at','asc')->limit(1)->first();
        for($i=0;Carbon::parse($oldest_date->created_at)->addMonth($i)->format('Y-m-d H:i:s')<=$today->format('Y-m-d H:i:s');$i++){
            $monthly_report[Carbon::parse($oldest_date->created_at)->addMonth($i)->format('Y-m')] = Delivery::select(DB::raw('SUM(amount) AS monthly_report'))
                        ->where('confirm_status',1)
                        ->where('created_at','>=',Carbon::parse($oldest_date->created_at)->addMonth($i)->format('Y-m-01 00:00:00'))
                        ->where('created_at','<=',Carbon::parse($oldest_date->created_at)->addMonth($i)->lastOfMonth())
                        ->first();
        }

        return view('cms.report')->with('total_report',$total_report->total_report)->with('monthly_report',$monthly_report);
    }
}
