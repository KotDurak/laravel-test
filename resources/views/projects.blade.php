@extends('layout')

@section('title', 'Список проектов')

@section('content')
    <div class="columns">
        <div class="column is-2 is-offset-10">
            <a href="{{route('project.create')}}" class="button is-success">Добавить проект</a>
        </div>
    </div>
    <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
        <thead>
        <tr>
            <th>Название</th>
            <th>Дата создания</th>

        </tr>
        </thead>
        <tbody>
        @foreach($projects as $project)
        <tr>
            <td><a href="{{url('project', ['id' => $project->id])}}">{{$project->name}}</a></td>
            <td>{{$project->created_at}}</td>
        </tr>
        @endforeach
        </tbody>
    </table>
@endsection