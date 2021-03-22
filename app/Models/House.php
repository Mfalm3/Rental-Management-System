<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class House extends Model
{
    use HasFactory;

    protected $fillable = ['house_number', 'property_id', 'price', 'description'];

    public function tenant()
    {
        return $this->hasOne(Tenant::class);
    }

    public function property()
    {
        return $this->belongsTo(Property::class);
    }
}
