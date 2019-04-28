<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ElementTypeAntecedent extends Model
{

    public $table= "element_type_antecedents";
    public $timestamps=true;

    protected $fillable = [
        'nom','type_antecedent_id'
    ];

    public function TypeAntecedent(){

        return $this->belongsTo('App\TypeAntecedents');
    }

}
