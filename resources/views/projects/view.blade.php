@extends('layout')

<?php
    $title =  'Просмотр <h1>проекта</h1> ' . $project->name;
?>

@section('title', htmlspecialchars($title))


@section('content')
    <h1 class="title is-1">{{$project->name}}</h1>

    <div class="content">
        {{$project->description}}
    </div>
@endsection


