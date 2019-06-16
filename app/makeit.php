<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class makeit extends Model
{
    protected $fillable = [ "nama", "kelamin", "umur", "email", "instansi", "no_telp", "instagram", "facebook", "twitter"];
}
