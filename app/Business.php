<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    protected $fillable=['nama','lokasi','penjelasan','foto','batch'];
}
