<?php

namespace App\Http\Controllers;

use App\TypeBilan;
use App\TypeBilanConsultation;
use Illuminate\Http\Request;

class TypeBilanConsultationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index_radiologie()
    {
        try{
            $get_type_bilan_radiologie = TypeBilan::where('nom','Radiologie')->first();
            if(count($get_type_bilan_radiologie) > 0){
                $get_all_type_radiologie = $get_type_bilan_radiologie->TypeBilanConsultations;
                if(count($get_all_type_radiologie) > 0){
                    return response()->json($get_all_type_radiologie);
                }else{
                    return response()->json(['error'=>" "]);
                }
            }else{
                return response()->json(['error'=>" "]);
            }

        }catch (\Exception $e){
            return response()->json(['error'=>" "]);
        }
    }

    public function index_biologie()
    {
        try{
            $get_type_bilan_biologie = TypeBilan::where('nom','Biologie')->first();

            if(count($get_type_bilan_biologie) > 0){

                $get_all_type_biologie = $get_type_bilan_biologie->TypeBilanConsultations;

                if(count($get_all_type_biologie) > 0){
                    return response()->json($get_all_type_biologie);
                }else{
                    return response()->json(['error'=>" "]);
                }
            }else{
                return response()->json(['error'=>" "]);
            }

        }catch (\Exception $e){
            return response()->json(['error'=>" "]);
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
    public function store_radiologie(Request $request)
    {
        try{
            if($request->ajax()){
                if($request->type_antecedent == "Type Bilan Radiologie") {
                    $get_type_bilan = TypeBilan::where('nom','Radiologie')->first();

                        if(count($get_type_bilan) > 0){

                            $type_bilan_consulation = new TypeBilanConsultation();
                            $type_bilan_consulation->nom= $request->nom ;
                            $type_bilan_consulation->type_bilan_id = $get_type_bilan->id ;
                            $type_bilan_consulation->save();

                            return response()->json($type_bilan_consulation);
                        }else{
                            return response()->json(['error'=>" "]);
                        }
                }else {
                    return response()->json(['error'=>" "]);
                }

            }

        }catch (\Exception $e){
            return response()->json(['error'=>" "]);
        }
    }



    public function store_biologie(Request $request){
        try{
            if($request->ajax()){
                if($request->type_antecedent == "Type Bilan Biologie") {
                    $get_type_bilan = TypeBilan::where('nom','Biologie')->first();
                    if(count($get_type_bilan) > 0){

                        $type_bilan_consulation = new TypeBilanConsultation();
                        $type_bilan_consulation->nom= $request->nom ;
                        $type_bilan_consulation->type_bilan_id = $get_type_bilan->id ;
                        $type_bilan_consulation->save();
                        return response()->json($type_bilan_consulation);
                    }else{
                        return response()->json(['error'=>" "]);
                    }
                }else {
                    return response()->json(['error'=>" "]);
                }
            }

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
    public function EditTypeBiologie(Request $request)
    {
        try {
            if ($request->ajax()) {

                $TypeBilanBiologieSelected = TypeBilanConsultation::find($request->Type_Bilan_Biologie_id_input);

                if (count($TypeBilanBiologieSelected) > 0) {
                    /* validation nom */
                    $TypeBilanBiologieSelected->nom = $request->nom_edit_Type_Bilan_Biologie;
                    $TypeBilanBiologieSelected->save();

                    return response()->json($TypeBilanBiologieSelected);

                } else {
                    return response()->json(['error' => "Une erreur est produit. L'élément n'existe pas !"]);
                }

            }

        }catch
        (\Exception $e){
            return response()->json(['error' => "Une erreur est produit. Veuiller réssayer"]);
        }
    }

    public function EditTypeRadiologie(Request $request)
    {
        try {
            if ($request->ajax()) {

                $TypeBilanRadiologieSelected = TypeBilanConsultation::find($request->Type_Bilan_Radiologie_id_input);

                if (count($TypeBilanRadiologieSelected) > 0) {
                    /* validation nom */
                    $TypeBilanRadiologieSelected->nom = $request->nom_edit_Type_Bilan_Radiologie;
                    $TypeBilanRadiologieSelected->save();

                    return response()->json($TypeBilanRadiologieSelected);

                } else {
                    return response()->json(['error' => "Une erreur est produit. L'élément n'existe pas !"]);
                }
            }

        }catch
        (\Exception $e){
            return response()->json(['error' => "Une erreur est produit. Veuiller réssayer"]);
        }
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
