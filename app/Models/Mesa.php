<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mesa extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'mesa';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'jrv';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'jrv',
        'latitude',
        'longitude',
        'departamento',
        'municipio',
        'comunidad',
        'empadronados',
        'sector',
        'correlativo',
        'nombre',
        'ubicacion',
        'zona',
        'fiscal',
        'estatus',
    ];


}
