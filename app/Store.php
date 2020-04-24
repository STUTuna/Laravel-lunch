<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Store extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $table = 'stores';

    protected $fillable = [
        'store_name',
        'store_tel',
        'store_remark'
    ];
}
