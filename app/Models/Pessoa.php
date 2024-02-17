<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pessoa extends Model
{
    use HasFactory, SoftDeletes;
    
    public $table = "pessoas";
    public $timestamps = false;
    
    protected $fillable = [
        'nome',
        'email',
    ];
}