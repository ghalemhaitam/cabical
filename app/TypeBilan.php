<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeBilan extends Model
{
    public $table= "type_bilans" ;
    public $timestamps=true;


    protected $fillable = [
        'nom'
    ];
    public function ElementTypeBilan(){

        return $this->hasMany('App\ElementTypeBilan','type_bilan_id');
    }

    public function TypeBilanConsultations(){

        return $this->hasMany('App\TypeBilanConsultation','type_bilan_id');
    }
}
