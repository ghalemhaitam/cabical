<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ordonnance extends Model
{
    public $table= "ordonnances";
    public $timestamps=true;

    protected $fillable = [
        'consultation_id'
    ];
    public function Consultation() {
        return $this->belongsTo('Consultation','consultation_id');
    }
    public function OrdonnanceDetails(){

        return $this->hasMany('App\OrdonnanceDetail','ordonnance_id');
    }


}
