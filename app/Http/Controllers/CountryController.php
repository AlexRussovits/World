<?php

namespace App\Http\Controllers;

use App\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countries = Country::orderBy('Code', 'asc')->latest()->paginate(8);
        return view('countries.listCountry', compact('countries'))
            ->with('i', (request()->input('page',1) - 1) * 8);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function show($code)
    {
       $country = Country::where('code', $code)->first();
       return view('countries.show', compact('country'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function edit(Country $country)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Country $country)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function destroy(Country $country)
    {
        //
    }

    public function search(Request $request) {
        $search = $request->input('search');

        $countries = Country::query()
            ->where('Name','LIKE', "%{$search}")
            ->orWhere('Continent', 'LIKE', "%{$search}")
            ->get();
        return view('countries.searchCountry', compact('countries'));
    }

    public function listContinent() {
        $continents=Country::distinct()->get('continent');
        return view('countries.countryContinent', compact('continents'));
    }

    public function filterCountry() {
        $continents=Country::distinct()->get('continent');
        $governments=Country::distinct()->get('GovernmentForm');
        $countries=Country::orderBy('Code', 'asc')->get();
        $numberMin=Country::query()->whereNotNull('IndepYear')->orderBy('IndepYear', 'asc')->first();
        $numberMax=Country::orderBy('IndepYear', 'desc')->first();
        return view('countries.countryFilter', compact('continents', 'governments', 'countries', 'numberMin', 'numberMax'));

    }

    public function filterShow(Request $request) {

        $continent = $request->input('continent');
        $government = $request->input('government');
        $numberFrom = $request->input('numberFrom');
        $numberTo = $request->input('numberTo');

        $countries = Country::query()
            ->where('Continent', 'LIKE', "%{$continent}%")
            ->where('GovernmentForm', 'LIKE', "%{$government}%")
            ->where('IndepYear', '>=', "{$numberFrom}")
            ->where('IndepYear', '<=', "{$numberTo}")
            ->get();

        if($numberFrom=='' && $numberTo=='') {
            $countries = Country::query()
                ->where('Continent', 'LIKE', "%{$continent}%")
                ->where('GovernmentForm', 'LIKE', "%{$government}%")
                ->get();
        }

        elseif($numberFrom=='') {
            $countries = Country::query()
                ->where('Continent', 'LIKE', "%{$continent}%")
                ->where('GovernmentForm', 'LIKE', "%{$government}%")
                ->where('IndepYear', '<=', "{$numberTo}")
                ->get();
        }

        elseif($numberTo=='') {
            $countries = Country::query()
                ->where('Continent', 'LIKE', "%{$continent}%")
                ->where('GovernmentForm', 'LIKE', "%{$government}%")
                ->where('IndepYear', '>=', "{$numberFrom}")
                ->get();
        }

        $continents=Country::distinct()->get('continent');
        $governments=Country::distinct()->get('GovernmentForm');
        $numberMin=Country::query()->whereNotNull('IndepYear')->orderBy('IndepYear', 'asc')->first();
        $numberMax=Country::orderBy('IndepYear', 'desc')->first();

        return view('countries.countryFilter', compact('continents', 'governments', 'countries', 'numberMin', 'numberMax'));


    }

}
