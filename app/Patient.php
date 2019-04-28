<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    public $table= "patients" ;
    public $timestamps=true;

    protected $fillable = [
        'nom','prenom','cin','sexe','date_naissance','tel1','tel2','email','mutuelle','ville_id'
    ];

    public function Ville(){

        return $this->belongsTo('App\Ville');
    }
    public function Consultation(){

        return $this->hasMany('App\Patient','patient_id');
    }
    public function Antecedents(){

        return $this->hasMany('App\Antecedent','patient_id');
    }
}
