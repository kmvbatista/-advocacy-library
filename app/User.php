<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users';
    public $timestamps = false;
    public function employee()
    {
        return $this->hasOne('App\Employee', 'employee_id');
    }
}
