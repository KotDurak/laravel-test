<?php
/** @var $events \Illuminate\Database\Eloquent\Collection */
?>

<h4 class="title is-4">Последние события</h4>
<table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
    <thead>
    <tr>
        <th>Название</th>
        <th>Описание</th>
        <th>Дата</th>
    </tr>
    </thead>
    <tbody>
    @foreach($events as $event)
        <tr>
            <td>{{$event->name}}</td>
            <td>{{$event->description}}</td>
            <td>{{$event->created_at}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
