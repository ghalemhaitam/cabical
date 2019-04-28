<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Antecedent extends Model
{

    public $table= "antecedents" ;
    public $timestamps=true;

    protected $fillable = [
        'nom_element_id','description','patient_id','type_antecedent_id'
    ];

    public function TypeAntecedent(){

        return $this->belongsTo('App\TypeAntecedents');
    }
    public function Patient(){
        return $this->belongsTo('App\Patient');
    }
}
