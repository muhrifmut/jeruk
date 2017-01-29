<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    public $table = "menu";

    protected $fillable = ['nama', 'harga', 'status', 'verifikasi', 'jumlah'];

    public function bahanmenu()
    {
        return $this->hasOne(BahanMenu::class);
    }

    public function pesanan()
    {
        return $this->hasOne(Pesanan::class);
    }
}
