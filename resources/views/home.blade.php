@extends('layout')

@section('title', 'Main page')

@section('content')
    <section class="section">
        @include('widgets.events', ['events' => $events])
    </section>
@endsection