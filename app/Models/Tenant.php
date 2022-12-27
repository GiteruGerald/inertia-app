<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function rentalAgreements()
    {
        return $this->hasMany(RentalAgreement::class);
    }

    public function unit()
    {
        return $this->hasOne(Unit::class,'id','unit_id');
    }
}
