<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeAntecedents extends Model
{
    public $table= "type_antecedents" ;
    public $timestamps=true;

    protected $fillable = [
        'nom'
    ];


    public function Antecedents(){

        return $this->hasMany('App\Antecedent','type_antecedent_id');
    }
    public function ElementTypeAntecedents(){

        return $this->hasMany('App\ElementTypeAntecedents','type_antecedent_id');
    }
}
