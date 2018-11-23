<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    /**
     * The roles that belong to the user.
     */
    public function users()
    {
        return $this->belongsToMany('App\User');
    }

    public function desejado_por(){
    	return $this->belongsToMany('App\User', 'whishlist');
    }

    public function autores(){
        return $this->belongsToMany('App\Autor', 'autor_book');
    }
}
