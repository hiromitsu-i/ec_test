@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm on">商品管理</div>
        <div class="col-sm"><a href="{{@route('delivery_check_index')}}">注文管理</a></div>
        <div class="col-sm"><a href="{{@route('report')}}">売上レポート</a></div>
    </div>
    <div class="container">
        <div><a href="{{@route('item_create')}}">商品登録</a></div>
        <table>
            <tr>
                <th>商品名</th>
                <th>写真url</th>
                <th>商品説明文</th>
                <th>価格</th>
                <th>検索用タグ</th>
                <th>登録日</th>
                <th>販売ステータス</th>
                <th></th>
                <th></th>
            </tr>
            @foreach($owner_items as $item)
            <tr>
                <td>{{$item->item_name}}</td>
                <td>{{$item->item_url??'未設定'}}</td>
                <td>{{$item->item_description}}</td>
                <td>{{$item->item_price}}</td>
                <td>{{$item->item_tag}}</td>
                <td>{{$item->created_at}}</td>
                <td>{{($item->sell_status==1)?'販売中':'販売中止'}}</td>
                <td><a href="/cms/item_edit/{{$item->id}}">編集</a></td>
                <td><a href="/cms/item_delete/{{$item->id}}">削除</a></td>
            </tr>
            @endforeach
        </table>
        <div>{!! $owner_items->render() !!}</div>
    </div>

@endsection
