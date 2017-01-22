<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meja extends Model
{
    public $table = "meja";

    protected $fillable = ['status'];
}
