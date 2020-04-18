<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $table = 'stores';
    
    protected $fillable = [
        'store_name',
        'store_tel',
        'store_remark'
    ];
}
