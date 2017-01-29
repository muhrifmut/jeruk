<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bahan extends Model
{
    public $table = "bahan";

    protected $fillable = ['nama', 'tgl_kadaluarsa'];

    public function bahanmenu()
    {
        return $this->hasOne(BahanMenu::class);
    }
}