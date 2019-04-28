<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ville extends Model
{
    public $table= "villes";
    public $timestamps=true;
    protected $fillable = [
        'nom'
    ];
    public function Patient(){

        return $this->hasMany('App\Patient','ville_id');
    }
}
