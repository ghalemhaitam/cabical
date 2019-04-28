<?php

namespace App\Http\Controllers;

use App\Consultation;
use App\MotifConsultation;
use App\MotifElements;
use App\MotifsRendezVous;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class MotifConsultationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
//return response()->json(['msg' => $nom_type_antecedent]);
            $motif_consult = MotifElements::all();
            return response()->json($motif_consult);

        }catch (\Exception $e){
            return response()->json(['msg'=>""]);
        }
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

                if($request->description_motif_consultation){


                    if(count($consultation)>0){
                        $consultation->MotifConsultations()->delete();
                    }else{
                        return response()->json(['error'=>'']);
                    }


                    for($i=0;$i<count($request->nom_motif_consultation);$i++){

                        $MotifConsultationNew = new MotifConsultation();
                        $element_type = MotifElements::where('nom',$request->nom_motif_consultation[$i])->first();

                        if(count($element_type) <= 0){
                            return response()->json(['error'=>"l'element n'existe pas"]);
                        }else{

                            $MotifConsultationNew->motif_element_id= $element_type->id;
                            if(trim($request->description_motif_consultation[$i]) == ''){
                                $MotifConsultationNew->description = ' ';
                            }else
                            {
                                $MotifConsultationNew->description = trim($request->description_motif_consultation[$i]);
                            };

                            $MotifConsultationNew->consultation_id = $consultation->id ;
                            $MotifConsultationNew->save();

                        }

                    }

                }else{
                    $consultation->MotifConsultations()->delete();
                }


                return response()->json(['success'=>"Sauvegarde avec success"]);

            }
        }catch (\Exception $e){
            return response()->json(['error'=>"Il existe une ERREUR veuillez redémarrer le systeme"]);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function search_motif()
    {
        $motif_id = Input::get('id');
        $motif = MotifsRendezVous::find($motif_id);
        if(count($motif) >0){
            return response()->json($motif);
        }else{
            return response()->json(['error'=>' ']);
        }
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
