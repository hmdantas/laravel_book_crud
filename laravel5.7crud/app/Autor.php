<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Autor extends Model
{
	protected $table = 'autores';

	public function books(){
        return $this->belongsToMany('App\Book', 'autor_book');
    }

}
