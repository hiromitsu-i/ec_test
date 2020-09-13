@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-sm"><a href="{{@route('cms_index')}}">商品管理</a></div>
        <div class="col-sm"><a href="{{@route('delivery_check_index')}}">注文管理</a></div>
        <div class="col-sm on">売上レポート</div>
    </div>
    <div class="container">
        <h2>売上レポート</h2>
        <div class="col-md-8">
            <p>総売上：{{$total_report}}円</p>
            @foreach($monthly_report as $key => $monthly)
                <p>月間売上({{$key}})：{{$monthly->monthly_report}}円</p>
            @endforeach
        </div>
    </div>
@endsection
