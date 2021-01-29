<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class users extends Model
{
    // Table Name
    protected $table = 'users';

    // Primary key
    public $primaryKey = 'id';
}
