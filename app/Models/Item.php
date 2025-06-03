<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $fillable = ['item_name', 'quantity', 'price', 'order_id'];
    protected $appends = ['sub_total'];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    // Accessor for sub_total
    public function getSubTotalAttribute()
    {
        $subTotal=$this->quantity * $this->price;
        return $subTotal;
    }
}
