<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $fillable = [ "nama", "kelamin", "umur", "angkatan", "jurusan", "kelas",  "email", "instansi", "no_telp", "kelompok", "pic", "interest", "tindakan","guru", "pertemuan", "pemahaman", "keterlibatan", "penugasan", "proyeksi", "status", "kolam", 'business_id','input_by','tags'];
}
