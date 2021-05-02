<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table = 'country';
    public $timestamps = true;

    protected $fillable = [
        'Code',
        'Name',
        'Continent',
        'Region',
        'IndepYear',
        'Population',
        'GovernmentForm',
        'HeadofState',
        'Code2'
    ];
}
