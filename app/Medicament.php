<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medicament extends Model
{


    public $table= "medicaments";
    public $timestamps=true;
    //code,nom,dci1,dosage1,unite_dosage1,forme,presentation,ppv,ph,prix_br,princeps_generique,taux_remboursement

    protected $fillable = [
        'code','nom','dci1','dosage1','unite_dosage1','forme','presentation','ppv','ph','prix_br','princeps_generique','taux_remboursement'
    ];

    public function OrdonnanceDetails(){

        return $this->belongsTo('App\OrdonnanceDetail','medicament_id');
    }
}
