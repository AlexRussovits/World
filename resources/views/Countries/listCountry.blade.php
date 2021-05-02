@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Countries List </h2>
                </div>
            </div>
        </div>
        @if (count($countries ?? '') > 0)
            <table class="table table-striped">
                <tr>
                    <th style="width:10%">Code</th>
                    <th style="width:10%">Country name</th>
                    <th style="width:10%">IndepYear</th>
                    <th style="width:20%">Continent</th>
                    <th style="width:10%">Detail</th>
                </tr>
                @foreach ($countries as $country)
                    <tr><!---->
                        <td>{{$country->Code}}</td>
                        <td>{{$country->Name}}</td>
                        <td>{{$country->IndepYear}}</td>
                        <td>{{$country->Continent}}</td>
                        <td>
                            <a href="{{url('detail/' . $country->Code)}}" title="show">Detail</a>
                        </td>
                    </tr>
                @endforeach
            </table>
            {!! $countries->links() !!}<!-- Это постраничная пагинация -->
        @else
            <p>Data no found</p>
        @endif
    </div>
@endsection
