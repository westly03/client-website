<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    protected $fillable = 
    [
        'sender_id', 
        'receiver_id',
        'package_name',
        'package_height',
        'package_width',
        'package_weight',
        'drop_location',
        'pickup_branch'
    ];

    public function sender() {
        return $this->belongsTo(Sender::class);
    }
    public function receiver() {
        return $this->belongsTo(Receiver::class);
    }
}
