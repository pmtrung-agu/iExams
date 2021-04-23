<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class XepPhongThi extends Eloquent
{
    use HasFactory;
    protected $connection = 'mongodb';
    protected $collection = 'iexams_xep_phong_thi';

    protected $fillable = [
        '_id', 'id_danhsachhocsinh', 'SBD', 'khoi', 'id_namhoc', 'hocky', 'ngaythi', 'id_buoithi', 'id_phongthi', 'hoten', 'ten', 'diemthi'
    ];

    protected $dates = ['ngaythi'];
}
