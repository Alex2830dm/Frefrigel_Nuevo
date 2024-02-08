<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorias_Productos extends Model
{
    use HasFactory;
    
    protected $table = "categorias_productos";
    protected $fillable = [
        'categoria'
    ];
}
