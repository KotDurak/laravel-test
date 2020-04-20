<?php
use Illuminate\Support\Facades\Session;
?>

@extends('layout')

@section('title', 'Добавить сотрудника')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <article class="message is-danger">
                        <div class="message-header">
                            <p>Ошибка</p>
                            <button class="delete" aria-label="delete"></button>
                        </div>
                        <div class="message-body">
                            <li>{{ $error }}</li>
                        </div>
                    </article>

                @endforeach
            </ul>
        </div>
    @endif

    @if(Session::has('message'))
        <article class="message is-success">
            <div class="message-header">
                <button class="delete" aria-label="delete"></button>
            </div>
            <div class="message-body">
                {{ Session::get('message') }}
            </div>
        </article>

    @endif

    <form action="{{url('users/edit', ['id' => $user->id])}}" method="POST">
        @csrf

        <input name="_method" type="hidden" value="PUT">

        <div class="field">
            <label class="label">Имя</label>
            <div class="control">
                <input class="input" type="text" placeholder="Text input" name="name" value="{{$user->name}}">
            </div>
        </div>


        <div class="field">
            <label class="label">Email</label>
            <div class="control has-icons-left has-icons-right">
                <input class="input" type="email" placeholder="Email input" name="email" value="{{$user->email}}">
            </div>
        </div>

        <div class="field">

        <div class="field is-grouped">
            <div class="control">
                <button class="button is-link">Редактировать</button>
            </div>
        </div>
    </form>
@endsection