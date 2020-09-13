@extends('layouts.app')
@section('title','商品一覧')
@section('description','商品の一覧ページ')
@section('canonical',url()->current())
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
                {!! Form::open(['route' => 'home', 'method' => 'get']) !!}
                <div class="form-group">
                    {!! Form::label('text', '商品名:') !!}
                    {!! Form::text('search' ,'', ['class' => 'form-control', 'placeholder' => '検索したい商品名を入れて下さい'] ) !!}
                </div>
                {!! Form::submit('検索', ['class' => 'btn btn-primary btn-block']) !!}
                {!! Form::close() !!}
        </div>
        <div class="card-deck">
            @foreach($item_list as $item)
                <div class="card" style="min-width:150px;margin:15px 15px;">
                    <img class="card-img-top" src="{{$item->item_url??asset('/img/no_image_250.png')}}" sytle="width:150px;height:150px;" alt="no_image">
                    <div class="card-body">
                        <h5 class="card-title">{{$item->item_name}}</h5>
                        <p class="card-text">{{$item->item_description}}</p>
                        <p class="card-text"><a href="/itemdetail/{{$item->id}}">商品詳細ページへ</a></p>
                    </div>
                </div>
            @endforeach
        </div>
        {!! $item_list->render() !!}
    </div>
</div>
@endsection
