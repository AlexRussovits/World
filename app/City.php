<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = 'city';
    public $timestamps = true;

    protected $fillable = [
      'ID',
      'Name',
      'CountryCode',
      'Population'
    ];
}
