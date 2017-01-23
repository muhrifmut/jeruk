<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    public $table = "pesanan";

    protected $fillable = ['id', 'nama', 'meja_id', 'menu_id', 'jumlah_menu', 'status'];

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }

    public function meja()
    {
        return $this->belongsTo(Meja::class);
    }
}
