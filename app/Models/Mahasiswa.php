<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $fillable= [
            'user_id',
            'nim',
            'asal',
            'tanggal_lahir',
            'gender',
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function detailSubject(){
        return $this->hasMany(DetailSubject::class);
    }

    public function jawabans(){
        return $this->hasMany(Jawaban::class);
    }
}