<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MotifConsultation extends Model
{
    public $table= "motif_consultations" ;
    public $timestamps=true;

    protected $fillable = [
        'motif_element_id','description','consultation_id'
    ];
    public function MotifsElement(){

        return $this->belongsTo('App\MotifElements');
    }
    public function Consultation(){

        return $this->belongsTo('App\Consultation');
    }
}
