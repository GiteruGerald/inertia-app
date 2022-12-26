<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function properties()
    {
        return $this->hasMany(Property::class);
    }

    public function propertyManagers()
    {
        return $this->hasMany(PropertyManager::class);
    }

    public function landlords()
    {
        return $this->hasMany(Landlord::class);
    }

}
