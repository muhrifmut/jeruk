<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    public $table = "transaksi";

    protected $fillable = ['nama', 'pegawai_id', 'pesanan_id', 'total_harga', 'kuisioner'];

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class);
    }

    public function pesanan()
    {
        return $this->belongsTo(Pesanan::class);
    }
}
