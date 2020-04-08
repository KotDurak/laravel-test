@extends('layout')

@section('title', 'Список проектов')

@section('content')
    <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
        <thead>
        <tr>
            <th>Название</th>
            <th>Дата создания</th>
            <th>Клиент</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td><a href="{{url('project', ['id' => 1])}}">Интернет магазин</a></td>
            <td>05.10.2019</td>
            <td>ООО Сбербанк</td>
        </tr>
        <tr>
            <td><a href="{{url('project', ['id' => 1])}}">Интернет магазин</a></td>
            <td>05.10.2019</td>
            <td>ООО Сбербанк</td>
        </tr>
        <tr>
            <td><a href="{{url('project', ['id' => 1])}}">Интернет магазин</a></td>
            <td>05.10.2019</td>
            <td>ООО Сбербанк</td>
        </tr>
        <tr>
            <td><a href="{{url('project', ['id' => 1])}}">Интернет магазин</a></td>
            <td>05.10.2019</td>
            <td>ООО Сбербанк</td>
        </tr>
        <tr>
            <td><a href="{{url('project', ['id' => 1])}}">Интернет магазин</a></td>
            <td>05.10.2019</td>
            <td>ООО Сбербанк</td>
        </tr>
        </tbody>
    </table>
@endsection