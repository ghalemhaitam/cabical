<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BilanConsultation extends Model
{

    public $table= "bilan_consultations" ;
    public $timestamps=true;

    protected $fillable = [
        'rc','type_bilan_consultation_id','consultation_id','prestataire_id'
    ];

    public function Prestataire(){

        return $this->belongsTo('App\Prestataire','prestataire_id');
    }
    public function Consultation(){

        return $this->belongsTo('App\Consultation','consultation_id');
    }
    public function TypeBilanConsultation(){

        return $this->belongsTo('App\TypeBilanConsultation','type_bilan_consultation_id');
    }
}
