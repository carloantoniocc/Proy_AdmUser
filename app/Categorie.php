<?php

namespace AdmUsers;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{

    protected $table = 'categories';

    protected $fillable = [
    	'name','code','active',
    ];

    public function users(){
		$this->hasMany('app\Employe');
    }

    public function	scopeSearch($query, $name){
    	return $query->where('name', 'LIKE', "%$name%");

    }    
}
