<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    protected $fillable = ['calon_id', 'masyarakat_id'];

    public function calon()
    {
        return $this->belongsTo(Calon::class);
    }

    public function masyarakat()
    {
        return $this->belongsTo(Masyarakat::class);
    }
}
