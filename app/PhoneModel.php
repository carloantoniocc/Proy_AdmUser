<?php

namespace AdmUsers;

use Illuminate\Database\Eloquent\Model;

class PhoneModel extends Model
{
    protected $table = 'phone_models';

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
