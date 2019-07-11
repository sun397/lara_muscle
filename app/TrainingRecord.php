<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TrainingRecord extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'training_select_id',
        'weight',
        'rep',
        'set',
        'interval',
        'training_time'
    ];

    public function getByUserId($id)
    {
        return $this->where('user_id', $id)->get();
    }

    public function select()
    {
        return $this->belongsTo(TrainingSelect::class, 'training_select_id');
    }
}
