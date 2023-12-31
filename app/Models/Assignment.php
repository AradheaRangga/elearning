<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    use HasFactory;

    protected $fillable = [
        'subject_id',
        'title',
        'description',
        'content',
        'deadline',
    ];

    public function subject(){
        return $this->belongsTo(Subject::class);
    }

    public function jawabans(){
        return $this->hasMany(Jawaban::class);
    }
}