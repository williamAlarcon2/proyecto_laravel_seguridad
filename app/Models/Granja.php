<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Granja extends Model
{
    protected $table = 'granjas';
  	protected $fillable = ['nombreGra', 'alturaGra', 'idZona', 'idEmpresa', 'idMunicipio', 'idClima', 'idEstado', 'modulopGra','modulorGra','modulopeGra','modulolGra'];
  	protected $guarded = ['id'];
}
