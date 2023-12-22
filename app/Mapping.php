<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mapping extends Model
{
    protected $table = 'mapping';
    protected $primaryKey = 'id';
    protected $fillable = [
        'username',
        'bin_no',
        'batch_so',
        'no_urut'

    ];
}
