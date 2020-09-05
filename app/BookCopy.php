<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookCopy extends Model
{
    public $timestamps = false;

    protected $table = 'bookCopies';

    public function book()
    {
        return $this->hasOne('App\Book', 'id');
    }
}
