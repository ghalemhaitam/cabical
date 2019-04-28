<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeBilanConsultation extends Model
{

    public $table= "type_bilan_consultations";
    public $timestamps=true;

    protected $fillable = [
        'nom','type_bilan_id'
    ];

    public function TypeBilan(){

        return $this->belongsTo('App\TypeBilan','type_bilan_id');
    }
    public function BilanConsultations(){

        return $this->hasMany('App\BilanConsultation','type_bilan_consultation_id');
    }
}
