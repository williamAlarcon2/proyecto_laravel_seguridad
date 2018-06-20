<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guia extends Model
{
  protected $table = 'guias';
  protected $fillable = ['nombreGui','ModuloGui'];
  protected $guarded = ['id'];
}
