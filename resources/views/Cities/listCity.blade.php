@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Cities List </h2>
                </div>
            </div>
        </div>
        @include('cities.tableCity')
        <?php
        $countCity=App\City::count(); //количество записей в таблице
        ?>
        <p>Количество городов: {{$countCity}}</p>
    </div>
