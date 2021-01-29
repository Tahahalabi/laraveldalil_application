<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class advertisementModel extends Model
{
    // Table Name
    protected $table = 'advertisement';

    // Primary key
    public $primaryKey = 'id';
}
