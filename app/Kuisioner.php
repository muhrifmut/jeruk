<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kuisioner extends Model
{
    public $table = "kuisioner";

    protected $fillable = ['transaksi_id', 'nama', 'umur', 'kritikatausaran'];

    public function pertanyaan()
    {
        return $this->hasMany(Pertanyaan::class);
    }
}
