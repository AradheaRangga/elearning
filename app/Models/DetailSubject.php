<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailSubject extends Model
{
    use HasFactory;

    protected $fillable = [
            'mahasiswa_id',
            'subject_id',
    ];

    public function mahasiswa(){
        return $this->belongsTo(Mahasiswa::class);
    }


    public function subject(){
        return $this->belongsTo(Subject::class);
    }
}