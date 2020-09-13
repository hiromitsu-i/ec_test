@extends('layouts.app')
@section('content')
    @if (session('message_success'))
        <div class="alert alert-success">
            {{ session('message_success') }}
        </div>
    @elseif(session('message_error'))
        <div class="alert alert-danger">
            {{ session('message_error') }}
        </div>
    @endif
    <div class="row">
    <div class="col-sm"><a href="{{@route('cms_index')}}">商品管理</a></div>
    <div class="col-sm on">注文管理</div>
    <div class="col-sm"><a href="{{@route('report')}}">売上レポート</a></div>
    </div>
    <div class="container">
    <table>
        <tr>
            <th>住所</th>
            <th>アイテム</th>
            <th>金額</th>
            <th>注文確定ステータス</th>
            <th></th>
            <th></th>
        </tr>
        @foreach($delivery_list as $delivery)
            <tr>
                <td>{{$delivery->address}}</td>
                <td>
                @foreach(json_decode($delivery->items) as $item)
                    {{$item}}
                @endforeach
                </td>
                <td>{{$delivery->amount}}</td>
                <td>
                    {{Form::open(['route'=>'delivery_confirm','method'=>'post'])}}
                    {{Form::token()}}
                    {{Form::label('confirm_status','注文確定ステータス')}}
                    {{Form::select('confirm_status',[0=>'未確定',1=>'確定',2=>'キャンセル'],$delivery->confirm_status)}}<br/>
                    {{Form::label('mail_status','メールステータス')}}
                    {{Form::select('mail_status',[0=>'未送信',1=>'送信済'],$delivery->mail_status)}}
                    {{Form::hidden('id',$delivery->id)}}
                    {{Form::submit()}}
                    {{Form::close()}}
                </td>
            </tr>
        @endforeach
    </table>
    <div>{!! $delivery_list->render() !!}</div>
    </div>
@endsection
