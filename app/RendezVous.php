<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RendezVous extends Model
{
    public $table= "rendez_vous" ;
    public $timestamps=true;


    protected $fillable = [
        'date_rendez_vous','accepte','patient_id','motif_id','annuller'
    ];
    public function  MotifsRendezVous(){

        return $this->belongsTo('App\MotifsRendezVous');
    }
}
