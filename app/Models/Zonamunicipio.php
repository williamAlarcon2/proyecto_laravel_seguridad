<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Zonamunicipio extends Model
{
    protected $table = 'zonamunicipios';
  	protected $fillable = [ 'idMunicipio', 'idZona'];
 	 protected $guarded = ['id'];

}
