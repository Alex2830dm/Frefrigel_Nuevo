<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    use HasFactory;

    protected $primaryKey = "id";
    protected $table = "productos";
    protected $fillable = [
        'nameProduct',
        'descriptionProduct',
        'unitProduct',
        'cantidad',
        'id_categoria',
        'priceProduct',
        'foto',
        'activo'
    ];
}
