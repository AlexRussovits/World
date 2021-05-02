@if (count($cities ?? '') > 0)
    <table class="table table-striped">
        <tr>
            <th style="width:10%">Code</th>
            <th style="width:10%">City name</th>
            <th style="width:10%">CountryCode</th>
            <th style="width:20%">Population</th>
        </tr>
        @foreach ($cities as $city)
            <tr><!---->
                <td>{{$city->ID}}</td>
                <td>{{$city->Name}}</td>
                <td>{{$city->CountryCode}}</td>
                <td>{{$city->Population}}</td>
            </tr>
        @endforeach
    </table>
    {!! $cities->links() !!}<!-- Это постраничная пагинация -->
@else
    <p>Data no found</p>
@endif
