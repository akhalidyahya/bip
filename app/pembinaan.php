<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pembinaan extends Model
{
    protected $fillable = [ "nama", "kelamin", "umur", "angkatan", "jurusan", "kelas",  "email", "instansi", "no_telp", "kelompok", "pic", "interest", "tindakan","murabbi", "liqo", "bisnis", "pemahaman", "keterlibatan", "penugasan", "proyeksi", "status", "kolam"];
}
