<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tarefa extends Model
{
     protected $table = 'tarefa';   // mesmo nome usado na migration
    protected $fillable = ['titulo', 'descricao', 'concluida'];
}
