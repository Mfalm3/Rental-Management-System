<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $fillable = ['uuid','landlord_id','name','location','account_number'];
    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'uuid';
    }

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable')->select(['id','url']);
    }

    public function proprietor()
    {
        return $this->belongsTo(Landlord::class,'landlord_id');
    }

    public function houses()
    {
        return $this->hasMany(House::class);
    }
}
