<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrdonnanceDetail extends Model
{

    public $table= "ordonnance_details";
    public $timestamps=true;

    protected $fillable = [
        'medicament_id','ordonnance_id','prise','quantite','periode','quand','nombre_par_jour','remarque'
    ];

    public function Ordonnance(){

        return $this->belongsTo('App\Ordonnance','ordonnance_id');
    }
    public function Medicament(){

        return $this->hasMany('App\Medicament','medicament_id');
    }
}
