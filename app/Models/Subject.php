<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'subject_name',
        'dosen_id',
    ];


    public function presences(){
        return $this->hasMany(Presence::class);
    }

    public function assignments(){
        return $this->hasMany(Assignment::class);
    }

    public function detailSubject(){
        return $this->hasMany(DetailSubject::class);
    }

    public function dosen(){
        return $this->belongsTo(Dosen::class);
    }
}
