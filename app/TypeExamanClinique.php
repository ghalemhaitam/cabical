<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeExamanClinique extends Model
{
    public $table= "type_examan_cliniques" ;
    public $timestamps=true;


    protected $fillable = [
        'nom'
    ];
    public function ElementTypeExamans(){

        return $this->hasMany('App\ElementTypeExaman','type_examan_clinique_id');
    }
}
