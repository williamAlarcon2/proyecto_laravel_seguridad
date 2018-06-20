<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guiaproduccion extends Model
{
  protected $table = 'guiaproduccions';
  protected $fillable = ['tbGup','tb1Gup','tb2Gup','real4Gup','tab1Gup','real5Gup','tab2Gup','prodtbGup','haatabGup','grtbGup','idGuia','pesohuevotablaGup'];
  protected $guarded = ['id'];
}
