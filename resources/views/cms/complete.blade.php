@extends('layouts.app')
@section('content')
    <p>{{$message}}</p>
    <p><a href="{{@route('cms_index')}}">一覧に戻る</a></p>
@endsection
