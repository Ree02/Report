<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subject extends Model
{
    use SoftDeletes;

    public function reports()
    {
        return $this->hasMany('App\Report', 'subject_id', 'id');
    }
}
