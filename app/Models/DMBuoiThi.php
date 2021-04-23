<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class DMBuoiThi extends Eloquent
{
    use HasFactory;
    protected $connection = 'mongodb';
    protected $collection = 'iexams_dm_buoi_thi';

    protected $fillable = [
        '_id', 'ten', 'mota'
    ];
}
