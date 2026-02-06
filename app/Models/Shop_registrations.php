<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shop_registrations extends Model
{
      protected $fillable = [
        'user_id',
        'name',
        'email',
        'address',
        'phone_number',
        'district',
        'state',
        'gst_number',
        'ffssai',
        'municipality_license',
        'shop_owner_name',
        'aadhar_card',
        'pancard',
    ];
}
