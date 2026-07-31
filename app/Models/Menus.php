<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Item;
use App\Models\Shop_registrations;

class Menus extends Model
{
    protected $table = 'menus';

    protected $fillable = [
        
        'item_id',
        'shop_id',
        'special_rate',
        
    ];

   
    public function shop()
    {
        return $this->belongsTo(Shop_registrations::class, 'shop_id');
    }

     public function item()
    {
        return $this->belongsTo(Item::class, 'item_id');
    }

    }
