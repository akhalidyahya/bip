<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $fillable=['judul','isi','tanggal','businesses_id','penulis'];
}
