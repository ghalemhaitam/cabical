<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ElementTypeBilan extends Model
{
    public $table= "element_type_bilans";
    public $timestamps=true;


    protected $fillable = [
        'nom','type_bilan_id'
    ];
    public function BilanParaclinique(){

        return $this->hasMany('App\BilanParaclinique','element_type_bilan_id');
    }
    public function TypeBilan(){

        return $this->belongsTo('App\TypeBilan','type_bilan_id');
    }
}
