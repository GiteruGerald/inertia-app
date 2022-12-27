<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    // protected $fillable = ['name', 'location_id','manager_id', 'landlord_id'];
    protected $guarded = [];
    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function landlord()
    {
        return $this->belongsTo(Landlord::class);
    }

    public function manager()
    {
        return $this->hasOne(PropertyManager::class,'id','manager_id');
    }
}
