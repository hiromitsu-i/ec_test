@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2>商品登録ページ</h2>
                <div>
                    {{Form::open(['route'=>'item_create','method'=>'post'])}}
                    {{Form::token()}}
                    {{Form::label('item_name','商品名')}}
                    {{Form::input('text','item_name')}}<br/>
                    {{Form::label('item_url','商品写真URL')}}
                    {{Form::input('text','item_url')}}<br/>
                    {{Form::label('item_description','商品説明文')}}
                    {{Form::input('text','item_description')}}<br/>
                    {{Form::label('item_price','価格')}}
                    {{Form::input('text','item_price')}}<br/>
                    {{Form::label('item_tag','商品検索用タグ')}}
                    {{Form::input('text','item_tag')}}<br/>
                    {{Form::label('sell_status','販売ステータス')}}
                    {{Form::select('sell_status',[0=>'販売中止',1=>'販売中'],1)}}<br/>
                    {{Form::hidden('id',$user_id)}}
                    {{Form::submit()}}
                    {{Form::close()}}
                </div>
            </div>
        </div>
    </div>
@endsection
