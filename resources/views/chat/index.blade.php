@extends('layout')

@section('title', 'Чат')

@section('content')
    <div id="chat">
        <chat v-bind:user_to="{{$user_to}}" v-bind:user_from="{{$user_from}}" v-bind:messages="{{json_encode($messages)}}"></chat>
    </div>
@endsection