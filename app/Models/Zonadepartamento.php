<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Zonadepartamento extends Model
{
    protected $table = 'zonadepartamentos';
  	protected $fillable = ['idZona', 'idDepartamento'];
 	 protected $guarded = ['id'];
}
