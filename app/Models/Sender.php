<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sender extends Model
{
    use HasFactory;

    protected $fillable = 
    [
        'first_name', 'last_name', 'mobile_number'
    ];

    public function packages()
    {
       return $this->hasMany(Package::class);
    }
}
