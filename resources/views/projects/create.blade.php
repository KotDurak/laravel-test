@extends('layout')

@section('title', 'Добавить проект')

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

    <form action="{{route('project.store')}}" method="post">
        @csrf
        <div class="field">
            <label class="label">Название проекта</label>
            <div class="control">
                <input class="input" type="text"" name="name">
            </div>
        </div>

        <div class="field">
            <label class="label">Описание проекта</label>
            <textarea class="textarea" placeholder="Описание" name="description"></textarea>
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