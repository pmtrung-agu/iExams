<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class DanhSachHocSinh extends Eloquent
{
    use HasFactory;

    protected $connection = 'mongodb';
    protected $collection = 'iexams_danh_sach_hoc_sinh';

    protected $fillable = [
        '_id', 'SBD', 'id_hocsinh', 'maso', 'khoi', 'id_lophoc', 'lophoc', 'hoten', 'ten', 'id_namhoc', 'hocky'
    ];
}
