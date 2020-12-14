<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    protected $fillable =
    [
        'id',
        'user_id',
        'item_id',
        'quantity',
    ];
}
