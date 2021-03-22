<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    use HasFactory;

    protected $fillable = ['contacts'];

    public function agency()
    {
        return $this->belongsTo(Agency::class);
    }

    public function team()
    {
        return $this->belongsToMany(Team::class);
    }

    public function info(){
        return $this->morphOne(User::class, 'typeable');
    }
}
