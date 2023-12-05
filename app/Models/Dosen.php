<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'nip',
        'is_admin',
        'gender',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function subject(){
        return $this->hasOne(DetailSubject::class);
    }
}