<?php

namespace App\Http\Controllers;

use App\Item;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CmsController extends Controller
{
    public function __construct()
    {
        $this->middleware('cms');
    }
    //
    public function index(Request $request)
    {

        $user_id = Auth::id();
        $owner_items = Item::where('owner',$user_id)->paginate(100);

        return view('cms.index')->with('owner_items',$owner_items);
    }

    public function item_create(Request $request)
    {
        $user_id = Auth::id();

        DB::beginTransaction();
        if(!empty($request->input())) {
            try {
                Item::create([
                    'item_name' => $request->input('item_name'),
                    'item_url' => $request->input('item_url'),
                    'item_description' => $request->input('item_description'),
                    'item_price' => $request->input('item_price'),
                    'item_tag' => $request->input('item_tag'),
                    'owner' => $user_id,
                    'sell_status' => $request->input('sell_status')
                ]);
                DB::commit();
                $message = '商品登録が完了しました。';
            } catch (\Exception $e) {
                Log::error(json_encode($e));
                DB::rollBack();
                $message = '商品登録に失敗しました。';
            }
            return view('cms.complete')->with('message',$message);
        }

        return view('cms.create')->with('user_id',$user_id);
    }

    public function item_edit(Request $request,$item_id)
    {
        $user_id = Auth::id();
        $item = Item::where('id',$item_id)->where('owner',$user_id)->first();

        return view('cms.edit')->with('item',$item);

    }

    public function item_delete(Request $request,$id)
    {
        $item = Item::find($id);
        DB::beginTransaction();
        try{
            $item->delete();
            DB::commit();
            $message = '削除が完了しました。';
        }catch(\Exception $e){
            DB::rollBack();
            Log::error(json_encode($e));
            $message = '削除に失敗しました。';
        }

        return view('cms.complete')->with('message',$message);
    }

    public function item_complete(Request $request)
    {
        $item = Item::find($request->input('id'));
        DB::beginTransaction();
        try{
            $item->item_name = $request->input('item_name');
            $item->item_url = $request->input('item_url');
            $item->item_description = $request->input('item_description');
            $item->item_price = $request->input('item_price');
            $item->item_tag = $request->input('item_tag');
            $item->sell_status = $request->input('sell_status');
            $item->save();
            DB::commit();
            $message = '更新が完了しました。';
//            session()->flash('msg_success', '更新が完了しました');
        }catch(\Exception $e){
            Log::error(json_encode($e));
            DB::rollBack();
            $message = '更新に失敗しました。';
//            session()->flash('msg_danger', '更新に失敗しました');
        }

        return view('cms.complete')->with('message',$message);
    }
}
