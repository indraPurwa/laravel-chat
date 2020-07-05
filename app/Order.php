<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'usermer_id', 'usercus_id', 'status'
    ];
}
