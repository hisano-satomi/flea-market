<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BuyItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'item_id',
        'payment_method',
        'send_postcode',
        'send_address',
        'send_building',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function item()
    {
        return $this->belongsTo(Item::class);
    }
}
