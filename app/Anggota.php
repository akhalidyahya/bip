<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    protected $fillable=['nama','angkatan','instansi','businesses_id'];
}
