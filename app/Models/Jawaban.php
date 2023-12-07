<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jawaban extends Model
{
    use HasFactory;

    protected $fillable = [
        'assignment_id',
        'mahasiswa_id',
        'file'
    ];

    public function assignment(){
        return $this->belongsTo(Assignment::class);
    }

    public function mahasiswa(){
        return $this->belongsTo(Mahasiswa::class);
    }
}
