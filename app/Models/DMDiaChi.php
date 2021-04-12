<?php
namespace App\Models;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class DMDiaChi extends Eloquent
{
    //
    protected $connection = 'mongodb';
    protected $collection = 'dm_diachi';
}
