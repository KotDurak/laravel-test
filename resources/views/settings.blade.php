@extends('layout')

@section('title', 'Настройки')

@section('content')
    <form action="">
        <div class="field">
            <label class="label">Ваше имя</label>
            <div class="control has-icons-left has-icons-right">
                <input class="input is-success" type="text" placeholder="Text input" value="User">
                <span class="icon is-small is-left">
      <i class="fas fa-user"></i>
    </span>
                <span class="icon is-small is-right">
      <i class="fas fa-check"></i>
    </span>
            </div>
        </div>

        <div class="field">
            <label class="label">Email</label>
            <div class="control has-icons-left has-icons-right">
                <input class="input is-danger" type="email" placeholder="Email input" value="">
                <span class="icon is-small is-left">
      <i class="fas fa-envelope"></i>
    </span>
                <span class="icon is-small is-right">
      <i class="fas fa-exclamation-triangle"></i>
    </span>
            </div>
        </div>

        <div class="field">
            <label class="label">Профессия</label>
            <div class="control">
                <div class="select">
                    <select>
                        <option>Программист</option>
                        <option>Тестировщик</option>
                        <option>Дизайнер</option>
                        <option>Тех поддержка</option>
                    </select>
                </div>
            </div>
        </div>


        <div class="field is-grouped">
            <div class="control">
                <button class="button is-link">Submit</button>
            </div>
        </div>
    </form>
@endsection
