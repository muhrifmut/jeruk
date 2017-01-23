<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    public $table = "menu";

    protected $fillable = ['nama', 'harga', 'status', 'verifikasi'];

    public function bahanmenu()
    {
        return $this->hasOne(BahanMenu::class);
    }

    public function pesanan()
    {
        return $this->hasOne(Pesanan::class);
    }
}
