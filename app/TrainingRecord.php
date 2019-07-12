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

    public function getMyRecord($id, $input)
    {
        if (empty($input)) {
            return $this->orderBy('training_time', 'desc')->where('user_id', $id)->get();
        } else {
            return $this->where('user_id', $id)->where('training_time', 'LIKE', "%{$input}%")->get();
        }
    }

    public function select()
    {
        return $this->belongsTo(TrainingSelect::class, 'training_select_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
