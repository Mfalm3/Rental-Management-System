<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdListing extends Model
{
    use HasFactory;

    protected $fillable = ['uuid', 'description', 'location', 'price', 'contact'];

    public function getRouteKeyName()
    {
        return 'uuid';
    }

    public function images()
    {
        return $this->morphMany(Image::class,'imageable');
    }
}
