<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Checkpurpose extends Model
{
    //
    protected $rules = [
        'name'  => 'max:255|nullable'
    ];
}
