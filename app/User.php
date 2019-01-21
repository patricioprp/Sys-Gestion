<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use App\Notifications\ResetPasswordNotification;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
      */
    protected $table = 'DOCENTES';
    protected $primaryKey = 'id';
    protected $fillable = ['id','name','calle','numero','piso','codpostal','codlocalidad','iddoc','numdoc','sexo','nacimiento','telefono1','telefono2','estaodcivil','idpais','email','cuil','cbu','ingreso','antig_reco_dias','egreso','idobrasocial','idsituacion','idcondicion','idactividad','idmodalidad','idprovloc','siniestro','seguro','password'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }

    public function docenteCursos(){

        return $this->hasMany('\App\DocenteCurso','IDDOCENTECURSO');
      }
}
