<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $fillable = ['uuid','landlord_id','name','location','account_number'];

    public function proprietor()
    {
        return $this->belongsTo(Landlord::class);
    }

    public function houses()
    {
        return $this->hasMany(House::class);
    }
}
