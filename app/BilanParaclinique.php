<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BilanParaclinique extends Model
{
    public $table= "bilan_paracliniques" ;
    public $timestamps=true;

    protected $fillable = [
        'element_type_bilan_id','description','consultation_id'
    ];
    public function ElementTypeBilan(){

        return $this->belongsTo('App\ElementTypeBilan');
    }

    public function Consultation(){

        return $this->belongsTo('App\Consultation');
    }

}
