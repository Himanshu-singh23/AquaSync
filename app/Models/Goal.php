<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Goal extends Model
{
    protected $fillable = ['user_id', 'target_liters_per_month', 'month_year'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
