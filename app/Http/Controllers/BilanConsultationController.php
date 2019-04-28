<?php

namespace App\Http\Controllers;

use App\BilanConsultation;
use App\Consultation;
use App\Prestataire;
use App\TypeBilan;
use App\TypeBilanConsultation;
use Illuminate\Http\Request;

class BilanConsultationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store_radiologie(Request $request)
    {

        try{

            if($request->ajax()){

                $consultation = Consultation::find($request->consultation_id);
                $prestataire = Prestataire::where('nom',$request->nom_prestateur)->first();

                $existing_radiologie = 'non';
                if((count($consultation) > 0) && (count($prestataire) >0 )){

                  $type_bilan_consultation_search = TypeBilanConsultation::where('nom',$request->nom_type)->first();
                  $bilan_radiologie = $consultation->BilanConsultation;

                    if(count($bilan_radiologie)>0){
                        foreach ($bilan_radiologie as $e_b_c){
                           $type_bilan_consultation = TypeBilanConsultation::find($e_b_c->type_bilan_consultation_id);
                            if(count($type_bilan_consultation)>0){
                                $type_radiologie = TypeBilan::find($type_bilan_consultation->type_bilan_id);
                                if(count($type_radiologie)>0){
                                    if($type_radiologie->nom == 'Radiologie'){

                                        $existing_radiologie = $e_b_c;
                                    }
                                }
                            }
                        }
                    }


                    if(count($type_bilan_consultation_search)>0){

                      $type_bilan = TypeBilan::find($type_bilan_consultation_search->type_bilan_id);


                        if((count($type_bilan) > 0) && ($type_bilan->nom == "Radiologie") && ($existing_radiologie =='non') ){

                                    $bilan_consulation = new BilanConsultation();
                                    $bilan_consulation->prestataire_id= $prestataire->id ;
                                    $bilan_consulation->consultation_id= $consultation->id ;
                                    $bilan_consulation->type_bilan_consultation_id= $type_bilan_consultation_search->id ;
                                    $bilan_consulation->rc = $request->rc ;
                                    $bilan_consulation->save();

                                    return response()->json(['success'=>" "]);

                        }else if((count($type_bilan) > 0) && ($type_bilan->nom == "Radiologie")){

                            $bilan_edit = BilanConsultation::find($existing_radiologie->id);

                            if(count($bilan_edit)>0){
                                $bilan_edit->prestataire_id= $prestataire->id ;
                                $bilan_edit->consultation_id= $consultation->id ;
                                $bilan_edit->type_bilan_consultation_id= $type_bilan_consultation_search->id ;
                                $bilan_edit->rc = $request->rc ;
                                $bilan_edit->save();
                            }else{
                                return response()->json(['error'=>" "]);
                            }
                            return response()->json(['success'=>" "]);
                        }
                  }else {
                      return response()->json(['error'=>" "]);
                  }

                }else {
                    return response()->json(['error'=>" "]);
                }

            }else {
                return response()->json(['error'=>" "]);
            }

        }catch (\Exception $e){
            return response()->json(['error'=>"ok "]);
        }
    }

    public function store_biologie(Request $request)
    {
        try{

            if($request->ajax()){

                $consultation = Consultation::find($request->consultation_id);
                $prestataire = Prestataire::where('nom',$request->nom_prestateur)->first();

                $existing_biologie = 'non';
                if((count($consultation) > 0) && (count($prestataire) >0 )){

                    $type_bilan_consultation_search = TypeBilanConsultation::where('nom',$request->nom_type)->first();
                    $bilan_biologie = $consultation->BilanConsultation;

                    if(count($bilan_biologie)>0){
                        foreach ($bilan_biologie as $e_b_c){
                            $type_bilan_consultation = TypeBilanConsultation::find($e_b_c->type_bilan_consultation_id);
                            if(count($type_bilan_consultation)>0){
                                $type_radiologie = TypeBilan::find($type_bilan_consultation->type_bilan_id);
                                if(count($type_radiologie)>0){
                                    if($type_radiologie->nom == 'Biologie'){

                                        $existing_biologie = $e_b_c;
                                    }
                                }
                            }
                        }
                    }


                    if(count($type_bilan_consultation_search)>0){

                        $type_bilan = TypeBilan::find($type_bilan_consultation_search->type_bilan_id);


                        if((count($type_bilan) > 0) && ($type_bilan->nom == "Biologie") && ($existing_biologie =='non') ){

                            $bilan_consulation = new BilanConsultation();
                            $bilan_consulation->prestataire_id= $prestataire->id ;
                            $bilan_consulation->consultation_id= $consultation->id ;
                            $bilan_consulation->type_bilan_consultation_id= $type_bilan_consultation_search->id ;
                            $bilan_consulation->rc = $request->rc ;
                            $bilan_consulation->save();

                            return response()->json(['success'=>" "]);

                        }else if((count($type_bilan) > 0) && ($type_bilan->nom == "Biologie")){

                            $bilan_edit = BilanConsultation::find($existing_biologie->id);

                            if(count($bilan_edit)>0){
                                $bilan_edit->prestataire_id= $prestataire->id ;
                                $bilan_edit->consultation_id= $consultation->id ;
                                $bilan_edit->type_bilan_consultation_id= $type_bilan_consultation_search->id ;
                                $bilan_edit->rc = $request->rc ;
                                $bilan_edit->save();
                            }else{
                                return response()->json(['error'=>" "]);
                            }
                            return response()->json(['success'=>" "]);
                        }
                    }else {
                        return response()->json(['error'=>" "]);
                    }

                }else {
                    return response()->json(['error'=>" "]);
                }

            }
/*
                $consultation = Consultation::find($request->consultation_id);
                $prestataire = Prestataire::where('nom',$request->nom_prestateur)->first();


                $existing_biologie = 'non';



                if((count($consultation) > 0) && (count($prestataire) >0 ) && ($existing_biologie =='non') ){

                    $type_bilan_consultation_search = TypeBilanConsultation::where('nom',$request->nom_type)->first();

                    if(count($type_bilan_consultation_search)>0){

                        $type_bilan = TypeBilan::find($type_bilan_consultation_search->type_bilan_id);

                        if((count($type_bilan) > 0) && ($type_bilan->nom == "Biologie")){

                            $bilan_consulation = new BilanConsultation();
                            $bilan_consulation->prestataire_id= $prestataire->id ;
                            $bilan_consulation->consultation_id= $consultation->id ;
                            $bilan_consulation->type_bilan_consultation_id= $type_bilan_consultation_search->id ;
                            $bilan_consulation->rc = $request->rc ;
                            $bilan_consulation->save();

                            return response()->json(['success'=>" "]);

                        }else {
                            return response()->json(['error'=>" "]);
                        }
                    }else {
                        return response()->json(['error'=>" "]);
                    }

                }else {
                    return response()->json(['error'=>" "]);
                }

            }else {
                return response()->json(['error'=>" "]);
            }
            */

        }catch (\Exception $e){
            return response()->json(['error'=>" "]);
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
