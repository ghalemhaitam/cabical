<?php

namespace App\Http\Controllers;

use App\ElementTypeBilan;
use App\TypeBilan;
use Illuminate\Http\Request;

class ElementBilanParacliniqueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        try{
            $type_bilan = TypeBilan::where('nom','Biologie')->first();
            $element_bilan_paraclinique_typée= $type_bilan->ElementTypeBilan;

            return response()->json($element_bilan_paraclinique_typée);

        }catch (\Exception $e){
            return response()->json(['error'=>" "]);
        }
    }

    public function index2()
    {

        try{
            $type_bilan = TypeBilan::where('nom','Radiologie')->first();
            $element_bilan_paraclinique_typée= $type_bilan->ElementTypeBilan;

            return response()->json($element_bilan_paraclinique_typée);

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
    public function store(Request $request)
    {
        try{
            if($request->ajax()){
                if($request->type_antecedent == "Biologie") {
                    $search_biologie = TypeBilan::where('nom', 'Biologie')->first();
                    if (count($search_biologie) > 0) {
                        $TypeNew = new ElementTypeBilan();
                        $TypeNew->nom = $request->nom;
                        $TypeNew->type_bilan_id = $search_biologie->id;
                        $TypeNew->save();
                        return response()->json($TypeNew);
                    } else {
                        return response()->json(['error' => ""]);
                    }
                }else if ($request->type_antecedent == "Radiologie"){
                    $search_radiologie= TypeBilan::where('nom', 'Radiologie')->first();
                    if (count($search_radiologie) > 0) {
                        $TypeNew = new ElementTypeBilan();
                        $TypeNew->nom = $request->nom;
                        $TypeNew->type_bilan_id = $search_radiologie->id;
                        $TypeNew->save();
                        return response()->json($TypeNew);
                    } else {
                        return response()->json(['error' => ""]);
                    }
                }

            }
        }catch (\Exception $e){
            return response()->json(['error'=>""]);
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


    public function BilanParacliniqueBiologieElementEdit(Request $request)
    {
        try {
            if ($request->ajax()) {

                $BilanBiologieSelected = ElementTypeBilan::find($request->Bilan_Biologie_id_input);

                if (count($BilanBiologieSelected) > 0) {
                    /* validation nom */
                    $BilanBiologieSelected->nom = $request->nom_edit_Bilan_Biologie;
                    $BilanBiologieSelected->save();

                    return response()->json($BilanBiologieSelected);

                } else {
                    return response()->json(['error' => "Une erreur est produit. L'élément n'existe pas !"]);
                }

            }

        }catch
        (\Exception $e){
            return response()->json(['error' => "Une erreur est produit. Veuiller réssayer"]);
        }
    }


    public function BilanParacliniqueRadiologieElementEdit(Request $request)
    {
        try {
            if ($request->ajax()) {

                $BilanRadiologieSelected = ElementTypeBilan::find($request->Bilan_Radiologie_id_input);

                if (count($BilanRadiologieSelected) > 0) {
                    /* validation nom */
                    $BilanRadiologieSelected->nom = $request->nom_edit_Bilan_Radiologie;
                    $BilanRadiologieSelected->save();

                    return response()->json($BilanRadiologieSelected);

                } else {
                    return response()->json(['error' => "Une erreur est produit. L'élément n'existe pas !"]);
                }

            }

        }catch
        (\Exception $e){
            return response()->json(['error' => "Une erreur est produit. Veuiller réssayer"]);
        }
    }

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
