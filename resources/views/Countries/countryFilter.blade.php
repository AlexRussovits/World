@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <?php
                    $continent = '';
                    $government = '';
                    $numberFrom = '';
                    $numberTo = '';
                    $filter = '';
                    if(request()->continent) {
                        $continent=request()->continent;
                        $filter.=' - '.$continent;
                    }
                    if(request()->government) {
                        $government=request()->government;
                        $filter.=' - '.$government;
                    }
                    if(request()->numberFrom) {
                        $numberFrom=request()->numberFrom;
                    }
                    if(request()->numberTo) {
                        $numberTo=request()->numberTo;
                    }
                    if($numberFrom!='' || $numberTo!='') {
                        $filter.=' - IndepYear from '.$numberFrom.' to '.$numberTo;
                    }
                    ?>
                    <h2>Filter by Countries <span style="color: #cc1c1c;">{{$filter}}</span></h2>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="col-sm-3 margin-tb">
                    <div class="row">
                        <div class="form-group">
                            <a href="{{url('filter/')}}">All Countries</a>
                        </div>
                        <form action="{{url('filterSelect')}}" method="GET">
                            <div class="form-group">
                                <label>Select continent</label>
                                <select class="form-control" name="continent">
                                    <option value="" selected>Continent</option>
                                    @foreach($continents as $continent)
                                        <option value="{{$continent->continent}}"> {{$continent->continent}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Select Government Form</label>
                                <select class="form-control" name="government">
                                    <option value="" selected>Government Form</option>
                                    @foreach($governments as $government)
                                        <option value="{{$government->GovernmentForm}}"> {{$government->GovernmentForm}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Select IndepYear</label><br>
                                from <input name="numberFrom" type="number" value="{{$numberMin->IndepYear}}" class="form-control">
                                to <input name="numberTo" type="number" value="{{$numberMax->IndepYear}}" class="form-control">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary mb-2">Filter send</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-sm-9">
                    @if(count($countries ?? '') > 0)
                    <table class="table table-stripped">
                        <tr>
                            <th style="width:10%;">NN</th>
                            <th style="width:10%;">Code</th>
                            <th style="width: 20%;">Country name</th>
                            <th style="width: 20%;">Continent</th>
                            <th style="width: 20%;">Government Form</th>
                            <th style="width: 20%;">IndepYear</th>
                        </tr>
                        <?php $k=0; ?>
                        @foreach($countries as $country)
                            <?php $k++; ?>
                            <tr>
                                <td>{{$k}}</td>
                                <td>{{$country->Code}}</td>
                                <td>{{$country->Name}}</td>
                                <td>{{$country->Continent}}</td>
                                <td>{{$country->GovernmentForm}}</td>
                                <td>{{$country->IndepYear}}</td>
                            </tr>
                        @endforeach
                    </table>
                    @else
                        <p>Data no found</p>
                    @endif
                    <p><strong>Всего государств:</strong>{{count($countries)}}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
