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
    protected $primaryKey = 'id';

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
        'fecha_nacimiento',
        'sexo',
        'correo',
        'fiscal_electronico',
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
