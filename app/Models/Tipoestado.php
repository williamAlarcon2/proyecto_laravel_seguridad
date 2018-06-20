<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tipoestado extends Model
{
  protected $table = 'tipoestados';
  protected $fillable = ['nomTipoe'];
  protected $guarded = ['id'];
}
