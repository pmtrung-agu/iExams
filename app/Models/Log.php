<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Log extends Eloquent
{
    //
    protected $connection = 'mongodb';
    protected $collection = 'iexams_logs';
    //_id, action, id_user, email, name, id_collection, collection, data
}
