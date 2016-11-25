<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BahanMenu extends Model
{
    public $table = "bahanmenu";

    protected $fillable = ['menu_id', 'bahan_id', 'jumlah_bahan'];

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }

	public function bahan()
    {
        return $this->belongsTo(Bahan::class);
    }
}