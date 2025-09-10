<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'calon_id'];

    public function calon()
    {
        return $this->belongsTo(Calon::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
