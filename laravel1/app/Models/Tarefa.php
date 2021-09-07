<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarefa extends Model
{
	// protected $table = 'tarefas';
	// protected $primaryKey = 'id';
	// public $incrementing = true;
	// protected $keyType = 'int';
	public $timestamps = false;
	protected $fillable = [ 'titulo' ];
	// const CREATED_AT = 'data_criacao';
	// const UPDATED_AT = 'data_alteracao';
}
