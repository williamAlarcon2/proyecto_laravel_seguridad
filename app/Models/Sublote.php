<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sublote extends Model
{
    protected $table = 'sublotes';
  	protected $fillable = ['nombreSub', 'pollitasSub','idSistema', 'idLote','idEstado'];
  	protected $guarded = ['id'];
}
