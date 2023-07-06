<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fiscal extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'fiscals';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'correo';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombres',
        'apellidos',
        'dpi',       
        'departamento',
        'municipio',       
        'telefono',
        'rango_edad',
        'sexo',
        'correo',
    ];

    /**
     * The attributes that are filled automatically.
     *
     * @var array
     */
    protected $attributes = [
        'status' => 'Active',
    ];
}
