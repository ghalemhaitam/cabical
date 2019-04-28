<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeCertification extends Model
{
    public $table= "type_certifications" ;
    public $timestamps=true;


    protected $fillable = [
        'nom'
    ];
    public function CertificatMedicals(){

        return $this->hasMany('App\CerficatMedical','type_certification_id');
    }
}
