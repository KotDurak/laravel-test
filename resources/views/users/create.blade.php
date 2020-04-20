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

    <form action="{{url('users/storage')}}" method="POST">
        @csrf
        <div class="field">
            <label class="label">Имя</label>
            <div class="control">
                <input class="input" type="text" placeholder="Text input" name="name">
            </div>
        </div>


        <div class="field">
            <label class="label">Email</label>
            <div class="control has-icons-left has-icons-right">
                <input class="input" type="email" placeholder="Email input" name="email">
            </div>
        </div>

        <div class="field">
            <label class="label">Пароль</label>
            <p class="control has-icons-left">
                <input class="input" type="password" placeholder="Password" name="password">
                <span class="icon is-small is-left">
                  <i class="fas fa-lock"></i>
                </span>
            </p>
        </div>

        <div class="field is-grouped">
            <div class="control">
                <button class="button is-link">Submit</button>
            </div>
            <div class="control">
                <button class="button is-link is-light">Cancel</button>
            </div>
        </div>
    </form>
@endsection