<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pertanyaan extends Model
{
    public $table = "pertanyaan";

    protected $fillable = ['kuisioner_id', 'pertanyaan', 'jawaban'];

    public function kuisioner()
    {
        return $this->belongsTo(Kuisioner::class);
    }
}
