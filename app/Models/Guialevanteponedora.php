<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guialevanteponedora extends Model
{
  protected $table = 'guialevanteponedoras';
  protected $fillable = ['avediatabGul','graveactabGul','pesotabGul','convsemtabGul','gananciaaveriatGul','idGuia'];
  protected $guarded = ['id'];
}
