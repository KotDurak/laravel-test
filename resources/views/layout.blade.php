<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.0/css/bulma.min.css">
    <link rel="stylesheet" href="/css/app.css">
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
</head>
<body>
<div class="columns">
    <div class="column is-one-fifth has-text-centered has-text-weight-semibold	 app__logo">
        <a href="/" class="title">LOGO</a>
    </div>
    <div class="column columns is-centered  app__nav">
        <div class="column">
            <nav class="breadcrumb" aria-label="breadcrumbs">
                <ul>
                    <li><a href="{{url('projects')}}" class="has-text-white">Проекты</a></li>
                    <li><a href="{{url('settings')}}" class="has-text-white">Настройки</a></li>
                    <li><a href="{{url('users')}}" class="has-text-white">Сотрудники</a></li>
                </ul>
            </nav>
        </div>
        <div class="column search" id="search-app">
            <search></search>
        </div>

        <div class="column is-pull-right is-one-fifth">
            <figure class="image is-64x64">
                <img class="is-rounded" src="https://bulma.io/images/placeholders/128x128.png">
            </figure>
        </div>
    </div>
</div>
<div class="columns">
    <div class="column is-one-fifth  has-text-centered app__sidebar">
       Some vertical navigation
    </div>
    <div class="column app__content">
        @section('content')
        @show
    </div>
</div>
<script type="text/javascript" src="<?php echo asset('assets/js/jquery.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo asset('assets/js/main.js'); ?>"></script>
<script type="text/javascript" src="<?php echo asset('js/app.js') ?>"></script>
</body>
</html>