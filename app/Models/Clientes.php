<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{
    use HasFactory;

    protected $primaryKey = "id";
    protected $table = "clientes";
    protected $fillable = [
        'nameClient',
        'rsCliente',
        'phoneClient',
        'emailClient',
        'contactClient',
        'jobcontactClient',
        'phonecontactClient',
        'emailcontactClient',
        'addressStreet',
        'addressColony',
        'addressMunicipality',
        'addressState',
        'addressCP',
        'imageClient',
        'activo',
    ];
}
