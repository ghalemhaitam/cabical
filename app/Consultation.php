<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{
    public $table= "consultations";
    public $timestamps=true;
    protected $fillable = [
        'remarque','date_consultation','patient_id','type_id'
    ];
    public function Patient(){

        return $this->belongsTo('App\Consultation','patient_id');
    }
    public function  TypeMotif(){

        return $this->belongsTo('App\MotifsRendezVous');
    }
    public function MotifConsultations(){

        return $this->hasMany('App\MotifConsultation','consultation_id');
    }
    public function MotifsRendezVous(){

        return $this->hasMany('App\MotifsRendezVous');
    }
    public function ExamansClinique(){

        return $this->hasMany('App\ExamanClinique','consultation_id');
    }
    public function BilanParaclinique(){

        return $this->hasMany('App\BilanParaclinique','consultation_id');
    }
    public function BilanConsultation(){

        return $this->hasMany('App\BilanConsultation','consultation_id');
    }
    public function Ordonnance() {
        return $this->hasOne('App\Ordonnance','consultation_id');
    }
    public function CertificationMedical() {
        return $this->hasOne('App\CertificationMedical','consultation_id');
    }

}
