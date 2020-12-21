<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        "row",
        "placeNum",
        "status",
        "event",
        "cost",
        "order",
        "placeType",
        "order_id",
        "event_id",
    ];

    protected $casts = [
        'cost' => 'float'
    ];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
