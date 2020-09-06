@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2>商品詳細ページ</h2>
                <div>
                    <img src="{{asset('/img/no_image_250.png')}}"/>
                    <p>{{$item->item_name}}</p>
                    <p>{{$item->item_description}}</p>
                    <p><a href="/cart/{{$item->id}}">カートに追加</a></p>
                </div>
            </div>
        </div>
    </div>
@endsection
