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
}
