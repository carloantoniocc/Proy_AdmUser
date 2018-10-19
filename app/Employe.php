<?php

namespace AdmUsers;

use Illuminate\Database\Eloquent\Model;

class Employe extends Model
{

    //use Notifiable; //ncluyendo correo, SMS (a través de Nexmo) y Slack

    protected $table = 'employes';

    protected $fillable = [
        'fecha_ingreso', 'ape_paterno', 'ape_materno', 'name', 'email', 'anexo', 'piso' ,'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function department(){
        $this->belongsto('app\department');
    }

    public function establishment(){
        $this->belongsto('app\establishment');
    }

    public function categorie(){
        $this->belongsto('app\categorie');
    }

    public function phonemodel(){
        $this->belongsto('app\phonemodel');
    }

}
