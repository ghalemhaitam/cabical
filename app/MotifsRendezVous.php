<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MotifsRendezVous extends Model
{
    public $table= "motifs_rendez_vous" ;
    public $timestamps=true;


    protected $fillable = [
        'nom'
    ];
    public function RendezVous(){

        return $this->hasMany('App\RendezVous','motif_id');
    }
    public function Consultations(){

        return $this->hasMany('App\Consultation','type_id');
    }

}
