<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class DMPhongThi extends Eloquent
{
    use HasFactory;
    protected $connection = 'mongodb';
    protected $collection = 'iexams_dm_phong_thi';

    protected $fillable = [
        '_id', 'ten', 'so_cho', 'mota'
    ];
}
