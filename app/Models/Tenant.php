<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $fillable = ['house_id', 'contacts'];

    public function info()
    {
        return $this->morphOne(User::class, 'typeable');
    }

    public function house()
    {
        return $this->belongsTo(House::class);
    }
}
