<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MotifElements extends Model
{
    public $table= "motif_elements" ;
    public $timestamps=true;


    protected $fillable = [
        'nom'
    ];
    public function MotifsConsultation(){

        return $this->hasMany('App\MotifConsultation','motif_element_id');
    }

}
