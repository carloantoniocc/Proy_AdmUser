<?php

namespace AdmUsers;

use Illuminate\Database\Eloquent\Model;

class Establishment extends Model
{
    //use notifiable;

	protected $table = 'establishments';

    protected $fillable = [
    	'name',
    ];

    public function employe(){
		$this->hasMany('app\Employe');
    }

    public function users()
    {
        return $this->belongsToMany('app\User');
    }    

    public function comuna()
    {
        return $this->hasMany('app\Comuna');
    }    

    public function	scopeSearch($query, $name){
    	return $query->where('name', 'LIKE', "%$name%");

    }

    public function nombreEstablecimiento($id)
    {
        return Establishment::select('name')->where('id',$id);
    }    
    
}
