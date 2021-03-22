<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Landlord extends Model
{
    use HasFactory;

    protected $fillable = ['contacts'];

    public function properties()
    {
        return $this->hasMany(Property::class);
    }

    public function info()
    {
        return $this->morphOne(User::class, 'typeable');
    }
}

