<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prestataire extends Model
{
    public $table= "prestataires" ;
    public $timestamps=true;

    protected $fillable = [
        'nom','email','tel','ville','adresse'
    ];

    public function BilanConsultations(){

        return $this->hasMany('App\BilanConsultation','prestataire_id');
    }
}
