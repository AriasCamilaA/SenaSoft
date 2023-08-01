<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsuarioRol extends Model
{
    use HasFactory;
    protected $table = 'usuario_rol';
    protected $primaryKey = 'usuario_rol_id';
    public $timestamps = false;

}