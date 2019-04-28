<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ElementTypeExaman extends Model
{
    public $table= "element_type_examen" ;
    public $timestamps=true;


    protected $fillable = [
        'nom','type_examan_clinique_id	'
    ];
    public function ExamanClinique(){

        return $this->hasMany('App\ExamanClinique','element_type_examan_id');
    }
    public function TypeExamanClinique(){

        return $this->belongsTo('App\TypeExamanClinique','type_examan_clinique_id');
    }
}
