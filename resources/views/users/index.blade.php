@extends('layout')

@section('title', 'Сотрудники')

@section('content')
    <div class="columns">
        <div class="column is-2 is-offset-10">
            <a href="{{url('users/create')}}" class="button is-success">Добавить сотрудника</a>
        </div>
    </div>
    <div class="columns">
        <div class="column is-full">
            <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
                <thead>
                <tr>
                    <th>Имя</th>
                    <th>Email</th>
                    <th>Управление</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>  {{ $user->name }}</td>
                            <td>{{$user->email}}</td>
                            <td>
                                <a href="{{url('users/update', ['id' => $user->id])}}"><i class="fa fa-edit"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="columns is-centered">
        <div class="column is-half">
            {{ $users->links('paginate.view')}}
        </div>

    </div>
@endsection