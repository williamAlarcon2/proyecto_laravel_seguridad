<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ponedorasproduccion extends Model
{
    protected $table = 'ponedorasproduccions';
  	protected $fillable = ['idLote', 'programaPpr', 'fotoestimuloPpr', 'fotoperiodoPpr','idGuia','idSublote'];
  	protected $guarded = ['id'];
}
