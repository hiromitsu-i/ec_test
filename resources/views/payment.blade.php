@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2>決済ページ</h2>
                <div>
                    {{Form::open(['route'=>'payment_complete','method'=>'post'])}}
                    {{Form::token()}}
                    {{Form::label('name','お届け先名')}}
                    {{Form::input('text','name')}}<br/>
                    {{Form::label('prefecture','都道府県')}}
                    {{Form::input('text','prefecture')}}<br/>
                    {{Form::label('city','市区町村')}}
                    {{Form::input('text','city')}}<br/>
                    {{Form::label('address','字番地')}}
                    {{Form::input('text','address')}}<br/>
                    {{Form::label('building','ビル・マンション名')}}
                    {{Form::input('text','building')}}
                    <p>お支払い方法：代引き</p>
                    @foreach($payments['id'] as $key => $payment)
                        {{Form::hidden('id['.$key.']',$payment)}}
                    @endforeach
                    {{Form::hidden('amount',$payments['amount'])}}
                    {{Form::submit()}}
                    {{Form::close()}}
                </div>
            </div>
        </div>
    </div>
@endsection
