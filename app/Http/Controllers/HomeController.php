<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;

class HomeController extends Controller
{
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
            $item_list = Item::where('item_name','like','%'.$search.'%')->paginate(100);
        }else{
            $item_list = Item::paginate(100);
        }

        return view('home')->with('item_list',$item_list);
    }
}
