<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WeightRecord extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'weight',
        'fat',
        'weight_time',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
