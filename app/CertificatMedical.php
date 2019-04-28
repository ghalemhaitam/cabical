<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CertificatMedical extends Model
{
    public $table= "certificat_medicals";
    public $timestamps=true;


    protected $fillable = [
        'type_certification_id','consultation_id','de','a','duree_par_jour'
    ];
    public function Consultation(){

        return $this->belongsTo('App\Consultation','consultation_id');
    }
    public function TypeCertification(){

        return $this->belongsTo('App\TypeCertification','type_certification_id');
    }
}
