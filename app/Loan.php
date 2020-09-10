<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    public $timestamps = false;
    protected $table = 'loans';

   
    public function employee()
    {
        return $this->hasOne('App\Employee', 'id', 'employee_id');
    }

    public function bookCopy()
    {
        return $this->hasOne('App\BookCopy', 'id', 'bookCopy_id');
    }

}
