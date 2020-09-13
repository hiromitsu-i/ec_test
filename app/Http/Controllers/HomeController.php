<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    const SELL_STATUS_ON = 1;
    const SELL_STATUS_OFF = 0;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        if(!empty($search))
        {
            $item_list = Item::where('item_name','like','%'.$search.'%')->where('sell_status',self::SELL_STATUS_ON)->paginate(100);
        }else{
            $item_list = Item::where('sell_status',self::SELL_STATUS_ON)->paginate(100);
        }

        return view('home')->with('item_list',$item_list);
    }
}
