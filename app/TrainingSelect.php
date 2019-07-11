<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TrainingSelect extends Model
{
    use SoftDeletes;

    protected $fillable = ['name'];
    protected $table = 'training_selects';
}
