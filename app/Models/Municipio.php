<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
  protected $table = 'municipios';
  protected $fillable = ['nombreMun', 'idDepartamento'];
  protected $guarded = ['id'];
}
