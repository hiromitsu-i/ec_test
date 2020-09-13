<?php

namespace App\Http\Controllers;

use App\Delivery;
use App\Item;
use Illuminate\Support\Facades\Mail;
use App\Mail\DeriveryNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class DeliveryCheckController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('cms');
    }

    public function index()
    {
        $delivery_list = Delivery::paginate(100);
        foreach($delivery_list as $k => $delivery)
        {
            $item_name = [];
            $i = 0;
            foreach(json_decode($delivery->items) as  $item){
                $item_name[$i] = Item::find($item)->item_name;
                $i++;
            }
            $delivery_list[$k]['items'] = json_encode($item_name);
        }

        return view('cms.delivery.index')->with('delivery_list',$delivery_list);
    }

    public function confirm(Request $request)
    {
        $id = $request->input('id');
        $delivery = Delivery::find($id);
        DB::beginTransaction();
        try{
            $delivery->confirm_status = $request->input('confirm_status');
            $delivery->mail_status = $request->input('mail_status');
            $delivery->save();
            DB::commit();
            //メール送信処理
//            $text = '商品を発送しました。';
//            $to = 'hoge@hoge.com';
//            Mail::to($to)->send(new DeriveryNotification($text));

            return redirect('/cms/delivery_check')->with('message_success','ステータスの更新が完了しました。');
        }catch(\Exception $e){
            DB::rollBack();
            Log::error(json_encode($e));
            return redirect('/cms/delivery_check')->with('message_error','ステータスの更新に失敗しました。');
        }
    }
}
