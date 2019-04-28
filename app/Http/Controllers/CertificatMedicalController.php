<?php

namespace App\Http\Controllers;

use App\CertificatMedical;
use App\Consultation;
use App\TypeCertification;
use Faker\Provider\cs_CZ\DateTime;
use Illuminate\Http\Request;

class CertificatMedicalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{

            if($request->ajax()){

                $consultation = Consultation::find($request->consultation_id);
                $type_certificate = TypeCertification::where('nom',$request->type_certification)->first();
                $CertificatMedicalss = CertificatMedical::where('consultation_id',$consultation->id)->first();


                if((count($consultation) > 0) && (count($type_certificate) > 0) ){

                    $oldDate = $request->date_du;
                    $arr = explode('/', $oldDate);
                    $date_du = substr($arr[2], 0, 4).'-'.substr($arr[1], 0, 2).'-'.substr($arr[0], 0, 2);

                    $oldDate2 = $request->date_au;
                    $arr2 = explode('/', $oldDate2);
                    $date_au = substr($arr2[2], 0, 4).'-'.substr($arr2[1], 0, 2).'-'.substr($arr2[0], 0, 2);


                    if(($date_du < $date_au) && ($date_du >= date("Y-m-d"))  && (count($CertificatMedicalss) == 0)){

                        // get difference (Durée) in $diff
                        $start = strtotime($date_du);
                        $end = strtotime($date_au);
                        $diff = ceil(abs($end - $start) / 86400);

                        $certificat_medical = new CertificatMedical();
                        $certificat_medical->consultation_id =$consultation->id  ;
                        $certificat_medical->type_certification_id = $type_certificate->id;
                        $certificat_medical->de = $date_du;
                        $certificat_medical->a = $date_au;
                        $certificat_medical->duree_par_jour = $diff;

                        if($certificat_medical->save()){
                            return response()->json($diff);
                        }else{
                            return response()->json(["error"=>' ']);
                        }

                    }else if(($date_du < $date_au) && ($date_du >= date("Y-m-d"))  && (count($CertificatMedicalss) ==1)){
                        // get difference (Durée) in $diff
                        $start = strtotime($date_du);
                        $end = strtotime($date_au);
                        $difff = ceil(abs($end - $start) / 86400);


                        $CertificatMedicalss->consultation_id =$consultation->id ;
                        $CertificatMedicalss->type_certification_id = $type_certificate->id;
                        $CertificatMedicalss->de = $date_du;
                        $CertificatMedicalss->a = $date_au;
                        $CertificatMedicalss->duree_par_jour = $difff;


                        if($CertificatMedicalss->save()){
                            return response()->json($difff);
                        }else{
                            return response()->json(["error"=>' ']);
                        }
                    }else{
                        return response()->json(["error"=>' ']);
                    }


                }else{
                    return response()->json(['error'=>" 2"]);
                }
                return response()->json(['success'=>"Sauvegarde avec success"]);



            }else{
                    return response()->json(['error'=>" 3"]);
                }

        }catch (\Exception $e){
            return response()->json(['error'=>" 1"]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
