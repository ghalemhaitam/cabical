<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExamanClinique extends Model
{
    public $table= "examan_cliniques" ;
    public $timestamps=true;

    protected $fillable = [
        'element_type_examan_id','description','consultation_id'
    ];
    public function ElementTypeExaman(){

        return $this->belongsTo('App\ElementTypeExaman');
    }
    public function Consultation(){

        return $this->belongsTo('App\Consultation');
    }
}
