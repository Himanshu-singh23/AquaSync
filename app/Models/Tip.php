<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tip extends Model
{
    protected $fillable = ['user_id', 'title', 'content', 'location_tag'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
