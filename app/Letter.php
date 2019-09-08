<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Letter extends Model
{
    // Table Name
    protected $table = 'letters';
    // Primary key
    public $primaryKey = 'id';
}
