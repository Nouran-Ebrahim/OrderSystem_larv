<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $fillable = ['item_name','quantity','price','order_id'];
      public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
