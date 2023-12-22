<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transactions extends Model
{
    //

	protected $table = 'transactions';
    protected $primaryKey = 'id';
    protected $fillable = [
    	'plant',
        'bin_no',
        'item_no',
        'description',
        'variant',
        'qty_nav',
        'uom',
        'qty_count1',
        'date_count1',
        'username1',
        'qty_count2',
        'date_count2',
        'username2',
        'value'
    ];

}
