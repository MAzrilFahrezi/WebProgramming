<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class coffee extends Model
{
    use HasFactory;
    protected $table = "coffee";
    protected $primaryKey = "kdCoffee";
    public $incrementing = false;
}
