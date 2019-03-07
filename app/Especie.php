<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Especie extends Model
{
    protected $primaryKey = "ID";
    protected $table = "especies";
    public $timestamps = false;
}
